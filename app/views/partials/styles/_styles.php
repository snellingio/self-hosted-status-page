<style type="text/css">

a {
    color: <?=$this->e($template['link_color'])?>;
    line-height: 1.4;
}

a:hover {
    color: <?=$this->e($template['link_color'])?>;
}

.alert {
    font-weight: 700;
    font-size: 18px;
    line-height: 26px;
    padding: 20px;
}

body {
    font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 16px;
    background-color: <?=$this->e($template['body_background_color'])?>;
    color: <?=$this->e($template['font_color'])?>;
}

.ct-label {
    fill: rgba(0, 0, 0, .4);
    color: rgba(0, 0, 0, .4);
    font-size: 11px;
    line-height: 1.25;
    font-weight: bold;
}

.ct-line {
    stroke-width: 2px;
}

.ct-point {
    stroke-width: 0;
}

.ct-series-a .ct-line,
.ct-series-a .ct-point {
    stroke: <?=$this->e($template['graph_color'])?>;
}

.ct-label.ct-horizontal.ct-end {
    width: 50px !important;
    height: 20px;
    margin: -50px;
}

.container-fluid {
    max-width: 1400px;
}

.center {
    text-align: center;
}

.form-group {
    margin-bottom: 30px;
}

.full-width {
    max-width: 100%;
    width: 100%;
}

.graph {
    margin-top: 20px;
}

.graph-container {
    border: 1px solid <?=$this->e($template['border_color'])?>;
    border-radius: 4px;
    padding: 20px;
    margin-bottom: 20px;
}

.greens {
    color: <?=$this->e($template['greens'])?>;
}

.greens_bg {
    background-color: <?=$this->e($template['greens'])?>;
    color: #ffffff;
}

h1, h2, h3, h4, h5, h6 {
    margin-top: 5px;
    margin-bottom: 0px;
    font-weight: 700;
}

h1, .h1 {
    font-size: 41px;
}

h2, .h2 {
    font-size: 34px;
}

h3, .h3 {
    font-size: 28px;
}

h4, .h4 {
    font-size: 20px;
}

h4.radio-button {
    margin-top: 3px;
}

h5, .h5 {
    font-size: 16px;
}

h6, .h6 {
    font-size: 14px;
}

.incident-name {
    padding-bottom: 10px;
}

.incident-title {
    padding-bottom: 20px;
}

input[type="radio"],
input[type="checkbox"] {
    display: inline-block;
    margin-right: 10px;
}

.left-0 {
    margin-left: 0px !important;
}

.text-muted {
    color: <?=$this->e($template['light_font_color'])?>;
}

.list-group-item {
    padding: 20px;
    border: 1px solid <?=$this->e($template['border_color'])?>;
}

.name {
    padding-top: 15px;
    padding-bottom: 15px;
    font-weight: bold;
}

.nav-tabs>li>a {
    font-weight: bold;
    margin-right: 0px;
}

.nav-tabs>li>a:hover {
    background-color: #ddd;
}

.oranges {
    color: <?=$this->e($template['oranges'])?>;
}

.oranges_bg {
    background-color: <?=$this->e($template['oranges'])?>;
    color: #ffffff;
}

.page-header {
    border-bottom: 1px solid <?=$this->e($template['border_color'])?>;
}

.panel {
    -webkit-box-shadow: none;
    box-shadow: none;
    border-color: <?=$this->e($template['border_color'])?>;
}

.panel-default > .panel-heading.yellows_bg {
    background-color: <?=$this->e($template['yellows'])?>;
    color: #ffffff;
    border: none;
}

.panel-default > .panel-heading.yellows_bg a {
    color: #ffffff;
}

.panel-default>.panel-heading {
    border-color: <?=$this->e($template['border_color'])?>;
}

.radio-button {
    display: inline-block;
    margin: 0;
    margin-right: 20px;
    font-size: 16px;
}

.radio-button label {
    font-weight: normal;
}

.reds {
    color: <?=$this->e($template['reds'])?>;
}

.reds_bg {
    background-color: <?=$this->e($template['reds'])?>;
    color: #ffffff;
}

.section {
    text-align: center;
    padding-top: 50px;
    padding-bottom: 30px;
}

.status {
    text-align: right;
}

.well {
    background-color: #fff;
    box-shadow: none;
    border-color: <?=$this->e($template['border_color'])?>;
}

.yellows {
    color: <?=$this->e($template['yellows'])?>;
}

.yellows_bg {
    background-color: <?=$this->e($template['yellows'])?>;
    color: #ffffff;
}

.panel.yellows_border {
    border: 1px solid <?=$this->e($template['yellows'])?>;
}


.hidden-form {
    display:none;
}

html, body {
    height:100%;
}

.container-fluid {
    margin-top: 50px;
    margin-bottom: 50px;
}

.container-app {
    padding-left: 40px;
    padding-right: 40px;
    padding-bottom: 40px;
    background-color: #fff;
    border-radius: 4px;
    border:1px solid #E0E0E0;
    min-height: 500px;
}

</style>
