<?php

namespace Service;

class UptimeRobot
{

    public function getFromApi()
    {
        $url = $this->getMonitorApiUrl(UPTIMEROBOT_MONITOR_KEY, UPTIMEROBOT_MONITOR_ID);
        $context = stream_context_create(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
        $data    = file_get_contents($url, false, $context) ?? [];
        $data    = json_decode($data, true);
        $monitor = $data['monitors']['monitor'][0];
        return $monitor;
    }

    public function getMonitorApiUrl($monitorKey, $monitorId)
    {
        $responseTimesStartDate = date('Y-m-d', strtotime('-7 day', time()));
        $responseTimesEndDate   = date('Y-m-d');
        return 'https://api.uptimerobot.com/getMonitors?apiKey=' . $monitorKey . '&monitors=' . $monitorId . '&logs=1&responseTimes=1&responseTimesStartDate=' . $responseTimesStartDate .'&responseTimesEndDate='. $responseTimesEndDate .'&customUptimeRatio=1-7-14-30-45-60&format=json&noJsonCallback=1';
    }

    public function getResponseTimes($responseTimes)
    {
        $response = [];
        for ($index = 0; $index < count($responseTimes); $index++) {
            $time = strtotime($responseTimes[$index]['datetime']);
            if ($time > (strtotime('-7 day', time()))) {
                $response[] = [
                    'ms'    => intval($responseTimes[$index]['value']),
                    'time'  => $time,
                ];
            }
        }
        return $response;
    }

    public function getUpDownLog($upDowns)
    {
        $response = [];
        $current  = time();
        $end      = strtotime('-7 day', time());
        $status   = $upDowns[0]['type'];
        $index    = 0;

        while ($current > $end) {

            $time     = strtotime($upDowns[$index]['datetime']);

            if ($time > $end && $time >= $current) {
                $index++;
            }
                $response[] = [
                    'status' => (($upDowns[$index]['type'] == 1) ? 0 : 100),
                    'time'   => $current,
                ];

            $current -= 3600;

        }

        return $response;
    }

    public function getUptimeRatios($uptimeRatios)
    {
        $uptimes                = explode('-', $uptimeRatios);
        $uptime                 = [];
        $uptime['one']          = $uptimes[0] ?? 0;
        $uptime['seven']        = $uptimes[1] ?? 0;
        $uptime['fourteen']     = $uptimes[2] ?? 0;
        $uptime['thirty']       = $uptimes[3] ?? 0;
        $uptime['fourtyfive']   = $uptimes[4] ?? 0;
        $uptime['sixty']        = $uptimes[5] ?? 0;
        return $uptime;
    }

    public function summary()
    {
        $monitor      = $this->getFromApi();

        $uptimeRatios = $monitor['customuptimeratio'] ?? '';
        $uptimeRatios = $this->getUptimeRatios($uptimeRatios);

        $status       = ($monitor['status'] == 2) ? 'up' : 'down';

        $upDowns      = $monitor['log'] ?? 0;
        $upDowns      = $this->getUpDownLog($upDowns);

        $latency      = $monitor['responsetime'] ?? 0;
        $latency      = $this->getResponseTimes($latency);

        return [
            'status'       => $status,
            'uptimeratios' => $uptimeRatios,
            'statuses'     => $upDowns,
            'latency'      => $latency,
        ];
    }

}
