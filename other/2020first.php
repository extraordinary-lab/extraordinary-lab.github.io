<html lang="zh"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>实时疫情图</title>
    <script src="https://hm.baidu.com/hm.js?72373e67ad82598385e9c651b4d0aca6"></script><script type="text/javascript" src="static/echarts.min.js"></script>
    <script src="https://gallery.echartsjs.com/dep/echarts/map/js/world.js"></script>
    <script src="https://gallery.echartsjs.com/dep/echarts/map/js/china.js"></script>

    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?72373e67ad82598385e9c651b4d0aca6";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <style>
        body {
            height: 800px;
            overflow: hidden;
        }

        *:focus {
            outline: none;
        }

        #main {
            max-width: px;
            margin: auto;
        }

        .info {
            display: flex;
            justify-content: space-between;
            text-align: center;
            line-height: 0.5;
            border-bottom: 1px solid #ebebeb;
        }

        .info > div {
            flex-grow: 1;
            margin: 0 4px;
            border-radius: 3px;
        }

        .info > div > p:first-child {
            font-size: 12px;
        }

        .title {
            text-align: center;
        }

        .copyright {
            font-size: 10px;
            text-align: right;
            color: #909399;
        }

        .copyright a {
            text-decoration: none;
        }

        .copyright a:hover, a:active, a:visited, a:link, a:focus {
            color: #909399;
        }

        .map {
            position: relative;
            height: 400px;
        }

        #worldmap {
            height: 380px;
        }

        .copyright {
            position: relative;
            width: 100%;
        }

        .copyright, .map {
            top: -65px;
        }

        .hide {
            display: none;
        }

        #worldmap {
            width: 100%;
        }

        .button {
            display: inline-block;
            margin-bottom: 0;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            white-space: nowrap;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            height: 28px;
            padding: 0 15px;
            font-size: 14px;
            border-radius: 4px;
            transition: color .2s linear, background-color .2s linear, border .2s linear, box-shadow .2s linear;
            color: #515a6e;
            background-color: #fff;
            border-color: #dcdee2;
        }

        .btn-active {
            color: #fff;
            background-color: #2d8cf0;
            border-color: #2d8cf0;
        }

        .tab {
            margin-top: 5px;
            text-align: center;
        }
    </style>
    </head>

<body>
<div>
    <div class="title">2020新冠实时疫情图</div>
    <div class="tab">
        <button onclick="showcn(this)" id="btn-cn" class="button">中国</button>
        <button onclick="showworld(this)" id="btn-world" class="button btn-active">全球</button>
    </div>
    <div class="info" id="cninfo" style="display: none;">
        <div>
            <p>现存确诊</p>
            <p style="color: rgb(247, 76, 49);">4055</p>
        </div>
        <div>
            <p>境外输入</p>
            <p style="color: rgb(247, 130, 7);">595</p>
        </div>
        <div>
            <p>死亡</p>
            <p style="color: rgb(93, 112, 146);">3298</p>
        </div>
        <div>
            <p>治愈</p>
            <p style="color: rgb(40, 183, 163);">74742</p>
        </div>
    </div>

    <div class="info" id="worldinfo" style="display: flex;">
        <div>
            <p>现存确诊</p>
            <p style="color: rgb(247, 76, 49);">379698</p>
        </div>
        <div>
            <p>累计确诊</p>
            <p style="color: rgb(247, 130, 7);">447479</p>
        </div>
        <div>
            <p>累计死亡</p>
            <p style="color: rgb(93, 112, 146);">20441</p>
        </div>
        <div>
            <p>累计治愈</p>
            <p style="color: rgb(40, 183, 163);">47340</p>
        </div>
    </div>
</div>
<div id="cnmap" class="map" _echarts_instance_="ec_1585299093453" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative; display: none;"><div style="position: relative; width: 1350px; height: 400px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="1350" height="400" style="position: absolute; left: 0px; top: 0px; width: 1350px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div></div></div>
<div id="worldmap" class="map" _echarts_instance_="ec_1585299093454" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative; display: block;"><div style="position: relative; width: 1350px; height: 380px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="1350" height="380" style="position: absolute; left: 0px; top: 0px; width: 1350px; height: 380px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(50, 50, 50, 0.7); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 5px; left: 798px; top: 159px; pointer-events: none;">俄罗斯<br>现存确诊: 800</div></div>
<div class="copyright"></div>
<script type="text/javascript">
    var dom = document.getElementById("cnmap");
    var myChart = echarts.init(dom, null, {renderer: 'svg'});
    const cnoption = {
        bottom: '10px',
        tooltip: {
            show: true,
            trigger: 'item'
        },
        dataRange: {
            x: 'center',
            orient: 'horizontal',
            min: 0,
            max: 20000,
            text: ['高', '低'], // 文本，默认为数值文本
            splitNumber: 0,
            splitList: [
                {start: 1000, end: 99999},
                {start: 100, end: 1000},
                {start: 50, end: 100}, {start: 10, end: 50},
                {start: 1, end: 10},
                {start: 0, end: 0},
            ],
            inRange: {
                color: ['#fff', '#fff5c9', '#FDEBCF', '#F59E83', '#F59E83', '#CB2A2F', '#e6ac53', '#70161D']
            }
        },
        series: [
            {

                label: {

                    normal: {
                        fontFamily: 'Microsoft YaHei',
                        fontSize: 9,
                        show: true,

                    },
                    emphasis: {
                        show: false
                    }
                },
                name: '现存确诊',
                type: 'map',
                mapType: 'china',
                zoom: 1,
                itemStyle: {
                    normal: {
                        borderWidth: .5,//区域边框宽度
                        borderColor: '#B6B6B6',//区域边框颜色
                        areaColor: "#ffefd5",//区域颜色

                    },
                },
                data: JSON.parse('[{"name":"\u6e56\u5317","value":2896},{"name":"\u9999\u6e2f","value":339},{"name":"\u53f0\u6e7e","value":236},{"name":"\u5317\u4eac","value":153},{"name":"\u4e0a\u6d77","value":129},{"name":"\u5e7f\u4e1c","value":111},{"name":"\u798f\u5efa","value":35},{"name":"\u6d59\u6c5f","value":24},{"name":"\u6fb3\u95e8","value":23},{"name":"\u5185\u8499\u53e4","value":17},{"name":"\u5929\u6d25","value":16},{"name":"\u5c71\u4e1c","value":13},{"name":"\u7518\u8083","value":11},{"name":"\u6c5f\u82cf","value":10},{"name":"\u56db\u5ddd","value":9},{"name":"\u9655\u897f","value":8},{"name":"\u4e91\u5357","value":6},{"name":"\u6cb3\u5357","value":3},{"name":"\u6cb3\u5317","value":3},{"name":"\u91cd\u5e86","value":2},{"name":"\u9ed1\u9f99\u6c5f","value":2},{"name":"\u5e7f\u897f","value":2},{"name":"\u5c71\u897f","value":2},{"name":"\u8fbd\u5b81","value":2},{"name":"\u5409\u6797","value":2},{"name":"\u6c5f\u897f","value":1},{"name":"\u6e56\u5357","value":0},{"name":"\u5b89\u5fbd","value":0},{"name":"\u6d77\u5357","value":0},{"name":"\u8d35\u5dde","value":0},{"name":"\u65b0\u7586","value":0},{"name":"\u5b81\u590f","value":0},{"name":"\u9752\u6d77","value":0},{"name":"\u897f\u85cf","value":0}]'),
            },
        ],
        animation: false,
    };
    myChart.setOption(cnoption, true);


    var worldmapdom = document.getElementById("worldmap");
    var worldChart = echarts.init(worldmapdom, null, {renderer: 'svg'});
    const worldoption = {
        bottom: '10px',
        tooltip: {
            show: true,
            trigger: 'item',
            formatter: function (val) {
                return val.data.provinceName + '<br>' + '现存确诊: ' + val.data.value
            }
        },
        dataRange: {
            x: 'center',
            orient: 'horizontal',
            min: 0,
            max: 20000,
            text: ['高', '低'], // 文本，默认为数值文本
            splitNumber: 0,
            splitList: [
                {start: 10000, end: 99999},
                {start: 1000, end: 10000},
                {start: 99, end: 999},
                {start: 10, end: 99},
                {start: 0, end: 9},
            ],
            inRange: {
                color: ['#FAEBD2', '#D56355', '#BB3937','#CB2A2F', '#772526']
            }
        },
        series: [
            {

                label: {

                    normal: {
                        fontFamily: 'Microsoft YaHei',
                        fontSize: 9,
                        show: false
                    },
                    emphasis: {
                        show: false
                    }
                },
                name: '现存确诊',
                type: 'map',
                mapType: 'world',
                zoom: 0.8,
                itemStyle: {
                    normal: {label: {show: true, color: '#333'}, borderWidth: 0},
                },
                data: JSON.parse('[{"name":"United States","value":83831,"provinceName":"\u7f8e\u56fd"},{"name":"Italy","value":62553,"provinceName":"\u610f\u5927\u5229"},{"name":"Spain","value":45084,"provinceName":"\u897f\u73ed\u7259"},{"name":"Germany","value":37271,"provinceName":"\u5fb7\u56fd"},{"name":"France","value":22511,"provinceName":"\u6cd5\u56fd"},{"name":"Iran (Islamic Republic of)","value":16715,"provinceName":"\u4f0a\u6717"},{"name":"Switzerland","value":11647,"provinceName":"\u745e\u58eb"},{"name":"The United Kingdom","value":11059,"provinceName":"\u82f1\u56fd"},{"name":"Netherlands","value":6997,"provinceName":"\u8377\u5170"},{"name":"Austria","value":6340,"provinceName":"\u5965\u5730\u5229"},{"name":"Belgium","value":5665,"provinceName":"\u6bd4\u5229\u65f6"},{"name":"Korea","value":4665,"provinceName":"\u97e9\u56fd"},{"name":"China","value":4055,"provinceName":"\u4e2d\u56fd"},{"name":"Canada","value":3802,"provinceName":"\u52a0\u62ff\u5927"},{"name":"Turkey","value":3528,"provinceName":"\u571f\u8033\u5176"},{"name":"Portugal","value":3462,"provinceName":"\u8461\u8404\u7259"},{"name":"Norway","value":3301,"provinceName":"\u632a\u5a01"},{"name":"Australia","value":2854,"provinceName":"\u6fb3\u5927\u5229\u4e9a"},{"name":"Brazil","value":2838,"provinceName":"\u5df4\u897f"},{"name":"Sweden","value":2723,"provinceName":"\u745e\u5178"},{"name":"Israel","value":2615,"provinceName":"\u4ee5\u8272\u5217"},{"name":"Czechia","value":1905,"provinceName":"\u6377\u514b"},{"name":"Denmark","value":1835,"provinceName":"\u4e39\u9ea6"},{"name":"Ireland","value":1800,"provinceName":"\u7231\u5c14\u5170"},{"name":"Malaysia","value":1793,"provinceName":"\u9a6c\u6765\u897f\u4e9a"},{"name":"Luxembourg","value":1444,"provinceName":"\u5362\u68ee\u5821"},{"name":"Ecuador","value":1348,"provinceName":"\u5384\u74dc\u591a\u5c14"},{"name":"Chile","value":1286,"provinceName":"\u667a\u5229"},{"name":"Poland","value":1192,"provinceName":"\u6ce2\u5170"},{"name":"Pakistan","value":1149,"provinceName":"\u5df4\u57fa\u65af\u5766"},{"name":"Thailand","value":1034,"provinceName":"\u6cf0\u56fd"},{"name":"Japan","value":999,"provinceName":"\u65e5\u672c"},{"name":"Saudi Arabia","value":980,"provinceName":"\u6c99\u7279\u963f\u62c9\u4f2f"},{"name":"South Africa","value":925,"provinceName":"\u5357\u975e"},{"name":"Finland","value":865,"provinceName":"\u82ac\u5170"},{"name":"Romania","value":859,"provinceName":"\u7f57\u9a6c\u5c3c\u4e9a"},{"name":"Greece","value":847,"provinceName":"\u5e0c\u814a"},{"name":"Indonesia","value":806,"provinceName":"\u5370\u5ea6\u5c3c\u897f\u4e9a"},{"name":"Russia","value":800,"provinceName":"\u4fc4\u7f57\u65af"},{"name":"Iceland","value":744,"provinceName":"\u51b0\u5c9b"},{"name":"Panama","value":666,"provinceName":"\u5df4\u62ff\u9a6c"},{"name":"India","value":641,"provinceName":"\u5370\u5ea6"},{"name":"Philippines","value":634,"provinceName":"\u83f2\u5f8b\u5bbe"},{"name":"Argentina","value":576,"provinceName":"\u963f\u6839\u5ef7"},{"name":"Mexico","value":576,"provinceName":"\u58a8\u897f\u54e5"},{"name":"Peru","value":557,"provinceName":"\u79d8\u9c81"},{"name":"Estonia","value":533,"provinceName":"\u7231\u6c99\u5c3c\u4e9a"},{"name":"Slovenia","value":523,"provinceName":"\u65af\u6d1b\u6587\u5c3c\u4e9a"},{"name":"Singapore","value":509,"provinceName":"\u65b0\u52a0\u5761"},{"name":"Qatar","value":506,"provinceName":"\u5361\u5854\u5c14"},{"name":"Colombia","value":477,"provinceName":"\u54e5\u4f26\u6bd4\u4e9a"},{"name":"Serbia","value":451,"provinceName":"\u585e\u5c14\u7ef4\u4e9a"},{"name":"Croatia","value":436,"provinceName":"\u514b\u7f57\u5730\u4e9a"},{"name":"Dominican Republic","value":382,"provinceName":"\u591a\u7c73\u5c3c\u52a0"},{"name":"Egypt","value":369,"provinceName":"\u57c3\u53ca"},{"name":"Lebanon","value":342,"provinceName":"\u9ece\u5df4\u5ae9"},{"name":"Algeria","value":330,"provinceName":"\u963f\u5c14\u53ca\u5229\u4e9a"},{"name":"New Zealand","value":301,"provinceName":"\u65b0\u897f\u5170"},{"name":"Lithuania","value":285,"provinceName":"\u7acb\u9676\u5b9b"},{"name":"United Arab Emirates","value":279,"provinceName":"\u963f\u8054\u914b"},{"name":"Armenia","value":272,"provinceName":"\u4e9a\u7f8e\u5c3c\u4e9a"},{"name":"Bulgaria","value":258,"provinceName":"\u4fdd\u52a0\u5229\u4e9a"},{"name":"Morocco","value":257,"provinceName":"\u6469\u6d1b\u54e5"},{"name":"Bahrain","value":249,"provinceName":"\u5df4\u6797"},{"name":"Latvia","value":244,"provinceName":"\u62c9\u8131\u7ef4\u4e9a"},{"name":"Iraq","value":239,"provinceName":"\u4f0a\u62c9\u514b"},{"name":"Uruguay","value":232,"provinceName":"\u4e4c\u62c9\u572d"},{"name":"Costa Rica","value":229,"provinceName":"\u54e5\u65af\u8fbe\u9ece\u52a0"},{"name":"Hungary","value":223,"provinceName":"\u5308\u7259\u5229"},{"name":"Slovakia","value":219,"provinceName":"\u65af\u6d1b\u4f10\u514b"},{"name":"Andorra","value":216,"provinceName":"\u5b89\u9053\u5c14"},{"name":"Jordan","value":211,"provinceName":"\u7ea6\u65e6"},{"name":"Tunisia","value":192,"provinceName":"\u7a81\u5c3c\u65af"},{"name":"Ukraine","value":190,"provinceName":"\u4e4c\u514b\u5170"},{"name":"San Marino","value":185,"provinceName":"\u5723\u9a6c\u529b\u8bfa"},{"name":"Republic of Moldova","value":175,"provinceName":"\u6469\u5c14\u591a\u74e6"},{"name":"North Macedonia","value":174,"provinceName":"\u5317\u9a6c\u5176\u987f"},{"name":"Bosnia and Herzegovina","value":171,"provinceName":"\u6ce2\u9ed1"},{"name":"Kuwait","value":159,"provinceName":"\u79d1\u5a01\u7279"},{"name":"Albania","value":159,"provinceName":"\u963f\u5c14\u5df4\u5c3c\u4e9a"},{"name":"Burkina Faso","value":135,"provinceName":"\u5e03\u57fa\u7eb3\u6cd5\u7d22"},{"name":"Vietnam","value":133,"provinceName":"\u8d8a\u5357"},{"name":"Faroe Islands","value":132,"provinceName":"\u6cd5\u7f57\u7fa4\u5c9b"},{"name":"Cyprus","value":129,"provinceName":"\u585e\u6d66\u8def\u65af"},{"name":"Ghana","value":129,"provinceName":"\u52a0\u7eb3"},{"name":"Malta","value":129,"provinceName":"\u9a6c\u8033\u4ed6"},{"name":"International conveyance (Diamond Princess)","value":128,"provinceName":"\u94bb\u77f3\u516c\u4e3b\u53f7\u90ae\u8f6e"},{"name":"Kazakhstan","value":117,"provinceName":"\u54c8\u8428\u514b\u65af\u5766"},{"name":"Brunei Darussalam","value":109,"provinceName":"\u6587\u83b1"},{"name":"Venezuela","value":107,"provinceName":"\u59d4\u5185\u745e\u62c9"},{"name":"Azerbaijan","value":104,"provinceName":"\u963f\u585e\u62dc\u7586"},{"name":"Sri Lanka","value":100,"provinceName":"\u65af\u91cc\u5170\u5361"},{"name":"Senegal","value":96,"provinceName":"\u585e\u5185\u52a0\u5c14"},{"name":"Cambodia","value":94,"provinceName":"\u67ec\u57d4\u5be8"},{"name":"R\u00e9union","value":94,"provinceName":"\u7559\u5c3c\u65fa"},{"name":"Cote d Ivoire","value":93,"provinceName":"\u79d1\u7279\u8fea\u74e6"},{"name":"Afghanistan","value":93,"provinceName":"\u963f\u5bcc\u6c57"},{"name":"Oman","value":86,"provinceName":"\u963f\u66fc"},{"name":"Uzbekstan","value":83,"provinceName":"\u4e4c\u5179\u522b\u514b\u65af\u5766"},{"name":"Mauritius","value":79,"provinceName":"\u6bdb\u91cc\u6c42\u65af"},{"name":"Guadeloupe","value":76,"provinceName":"\u74dc\u5fb7\u7f57\u666e\u5c9b"},{"name":"Cameroon","value":71,"provinceName":"\u5580\u9ea6\u9686"},{"name":"occupied Palestinian territory","value":67,"provinceName":"\u5df4\u52d2\u65af\u5766"},{"name":"Georgia","value":67,"provinceName":"\u683c\u9c81\u5409\u4e9a"},{"name":"Honduras","value":67,"provinceName":"\u6d2a\u90fd\u62c9\u65af"},{"name":"Martinique","value":65,"provinceName":"\u9a6c\u63d0\u5c3c\u514b"},{"name":"Belarus","value":64,"provinceName":"\u767d\u4fc4\u7f57\u65af"},{"name":"Nigeria","value":62,"provinceName":"\u5c3c\u65e5\u5229\u4e9a"},{"name":"Trinidad & Tobago","value":59,"provinceName":"\u7279\u7acb\u5c3c\u8fbe\u548c\u591a\u5df4\u54e5"},{"name":"Cuba","value":56,"provinceName":"\u53e4\u5df4"},{"name":"Montenegro","value":52,"provinceName":"\u9ed1\u5c71"},{"name":"Liechtenstein","value":51,"provinceName":"\u5217\u652f\u6566\u58eb\u767b"},{"name":"Rwanda","value":50,"provinceName":"\u5362\u65fa\u8fbe"},{"name":"Puerto Rico","value":49,"provinceName":"\u6ce2\u591a\u9ece\u5404"},{"name":"Dem. Rep. Congo","value":45,"provinceName":"\u521a\u679c\uff08\u91d1\uff09"},{"name":"Kyrgyzstan","value":44,"provinceName":"\u5409\u5c14\u5409\u65af\u65af\u5766"},{"name":"Bolivia","value":39,"provinceName":"\u73bb\u5229\u7ef4\u4e9a"},{"name":"Paraguay","value":38,"provinceName":"\u5df4\u62c9\u572d"},{"name":"Guam","value":36,"provinceName":"\u5173\u5c9b"},{"name":"Mayotte","value":35,"provinceName":"\u9a6c\u7ea6\u7279"},{"name":"Bangladesh","value":32,"provinceName":"\u5b5f\u52a0\u62c9\u56fd"},{"name":"Monaco","value":32,"provinceName":"\u6469\u7eb3\u54e5"},{"name":"Guernsey","value":30,"provinceName":"\u6839\u897f\u5c9b"},{"name":"Kenya","value":29,"provinceName":"\u80af\u5c3c\u4e9a"},{"name":"French Guiana","value":28,"provinceName":"\u6cd5\u5c5e\u572d\u4e9a\u90a3"},{"name":"Gibraltar","value":26,"provinceName":"\u76f4\u5e03\u7f57\u9640"},{"name":"Jamaica","value":25,"provinceName":"\u7259\u4e70\u52a0"},{"name":"French Polynesia","value":25,"provinceName":"\u6cd5\u5c5e\u6ce2\u5229\u5c3c\u897f\u4e9a"},{"name":"Guatemala","value":23,"provinceName":"\u5371\u5730\u9a6c\u62c9"},{"name":"Isle of Man","value":23,"provinceName":"\u9a6c\u6069\u5c9b"},{"name":"Madagascar","value":23,"provinceName":"\u9a6c\u8fbe\u52a0\u65af\u52a0"},{"name":"Togo","value":22,"provinceName":"\u591a\u54e5"},{"name":"Aruba","value":19,"provinceName":"\u963f\u9c81\u5df4"},{"name":"Jersey","value":18,"provinceName":"\u6cfd\u897f\u5c9b"},{"name":"Barbados","value":18,"provinceName":"\u5df4\u5df4\u591a\u65af"},{"name":"United States Virgin Islands","value":17,"provinceName":"\u7f8e\u5c5e\u7ef4\u5c14\u4eac\u7fa4\u5c9b"},{"name":"The Republic of Zambia","value":16,"provinceName":"\u8d5e\u6bd4\u4e9a\u5171\u548c\u56fd"},{"name":"New Caledonia","value":14,"provinceName":"\u65b0\u5580\u91cc\u591a\u5c3c\u4e9a"},{"name":"Uganda","value":14,"provinceName":"\u4e4c\u5e72\u8fbe"},{"name":"Maldives","value":13,"provinceName":"\u9a6c\u5c14\u4ee3\u592b"},{"name":"The Republic of El Salvador","value":13,"provinceName":"\u8428\u5c14\u74e6\u591a"},{"name":"Tanzania","value":12,"provinceName":"\u5766\u6851\u5c3c\u4e9a"},{"name":"Eq.Guinea","value":12,"provinceName":"\u8d64\u9053\u51e0\u5185\u4e9a"},{"name":"Guinea","value":12,"provinceName":"\u51e0\u5185\u4e9a"},{"name":"The Republic of Djibouti","value":12,"provinceName":"\u5409\u5e03\u63d0"},{"name":"Mongolia","value":11,"provinceName":"\u8499\u53e4"},{"name":"Saint Martin","value":11,"provinceName":"\u5723\u9a6c\u4e01\u5c9b"},{"name":"Ethiopia","value":8,"provinceName":"\u57c3\u585e\u4fc4\u6bd4\u4e9a"},{"name":"Namibia","value":8,"provinceName":"\u7eb3\u7c73\u6bd4\u4e9a"},{"name":"Swaziland","value":8,"provinceName":"\u65af\u5a01\u58eb\u5170"},{"name":"The Republic of Haiti","value":8,"provinceName":"\u6d77\u5730"},{"name":"Cayman Islands","value":7,"provinceName":"\u5f00\u66fc\u7fa4\u5c9b"},{"name":"Niger","value":7,"provinceName":"\u5c3c\u65e5\u5c14"},{"name":"Suriname","value":7,"provinceName":"\u82cf\u91cc\u5357"},{"name":"Seychelles","value":7,"provinceName":"\u585e\u820c\u5c14"},{"name":"Bermuda","value":7,"provinceName":"\u767e\u6155\u5927"},{"name":"Mozambique","value":7,"provinceName":"\u83ab\u6851\u6bd4\u514b"},{"name":"Dominica","value":7,"provinceName":"\u591a\u7c73\u5c3c\u514b"},{"name":"Gabon","value":6,"provinceName":"\u52a0\u84ec"},{"name":"Eritrea","value":6,"provinceName":"\u5384\u7acb\u7279\u91cc\u4e9a"},{"name":"Laos","value":6,"provinceName":"\u8001\u631d"},{"name":"Cura\u00e7ao","value":5,"provinceName":"\u5e93\u62c9\u7d22\u5c9b"},{"name":"Bahamas","value":5,"provinceName":"\u5df4\u54c8\u9a6c"},{"name":"Central African Republic","value":5,"provinceName":"\u4e2d\u975e\u5171\u548c\u56fd"},{"name":"Greenland","value":5,"provinceName":"\u683c\u9675\u5170"},{"name":"Benin","value":5,"provinceName":"\u8d1d\u5b81"},{"name":"The Republic of Fiji","value":5,"provinceName":"\u6590\u6d4e"},{"name":"Syrian\u00a0ArabRepublic","value":5,"provinceName":"\u53d9\u5229\u4e9a"},{"name":"Myanmar","value":5,"provinceName":"\u7f05\u7538"},{"name":"Guyana","value":4,"provinceName":"\u572d\u4e9a\u90a3"},{"name":"Zimbabwe","value":4,"provinceName":"\u6d25\u5df4\u5e03\u97e6"},{"name":"Holy See","value":4,"provinceName":"\u68b5\u8482\u5188"},{"name":"Congo","value":4,"provinceName":"\u521a\u679c\uff08\u5e03\uff09"},{"name":"Angola","value":4,"provinceName":"\u5b89\u54e5\u62c9"},{"name":"Mauritania","value":3,"provinceName":"\u6bdb\u91cc\u5854\u5c3c\u4e9a"},{"name":"Antigua & Barbuda","value":3,"provinceName":"\u5b89\u63d0\u74dc\u548c\u5df4\u5e03\u8fbe"},{"name":"Saint Lucia","value":3,"provinceName":"\u5723\u5362\u897f\u4e9a"},{"name":"Saint Barthelemy","value":3,"provinceName":"\u5723\u5df4\u6cf0\u52d2\u7c73\u5c9b"},{"name":"Liberia","value":3,"provinceName":"\u5229\u6bd4\u91cc\u4e9a"},{"name":"Chad","value":3,"provinceName":"\u4e4d\u5f97"},{"name":"Nepal","value":2,"provinceName":"\u5c3c\u6cca\u5c14"},{"name":"Sudan","value":2,"provinceName":"\u82cf\u4e39"},{"name":"Gambia","value":2,"provinceName":"\u5188\u6bd4\u4e9a"},{"name":"Bhutan","value":2,"provinceName":"\u4e0d\u4e39"},{"name":"Somalia","value":2,"provinceName":"\u7d22\u9a6c\u91cc"},{"name":"Nicaragua","value":2,"provinceName":"\u5c3c\u52a0\u62c9\u74dc"},{"name":"Montserrat","value":2,"provinceName":"\u8499\u7279\u585e\u62c9\u7279"},{"name":"Belize","value":2,"provinceName":"\u4f2f\u5229\u5179"},{"name":"Mali","value":2,"provinceName":"\u9a6c\u91cc"},{"name":"Guinea-Bissau","value":2,"provinceName":"\u51e0\u5185\u4e9a\u6bd4\u7ecd"},{"name":"St.Kitts-Nevis","value":2,"provinceName":"\u5723\u5176\u8328\u548c\u5c3c\u7ef4\u65af"},{"name":"Cabo Verde","value":1,"provinceName":"\u4f5b\u5f97\u89d2"},{"name":"Saint Vincent and the Grenadines","value":1,"provinceName":"\u5723\u6587\u68ee\u7279\u548c\u683c\u6797\u7eb3\u4e01\u65af"},{"name":"Tinor-Leste","value":1,"provinceName":"\u4e1c\u5e1d\u6c76"},{"name":"Papua New Guinea","value":1,"provinceName":"\u5df4\u5e03\u4e9a\u65b0\u51e0\u5185\u4e9a"},{"name":"Grenada","value":1,"provinceName":"\u683c\u6797\u90a3\u8fbe"},{"name":"Turks & Caicos\u00a0Islands","value":1,"provinceName":"\u7279\u514b\u65af\u548c\u51ef\u79d1\u65af\u7fa4\u5c9b"},{"name":"Libya","value":1,"provinceName":"\u5229\u6bd4\u4e9a"}]'),
            },
        ],
        animation: false,
    };
    worldChart.setOption(worldoption, true);
    worldChart.resize();

    worldmap = document.getElementById("worldmap");
    cnmap = document.getElementById("cnmap");
    cninfo = document.getElementById("cninfo");
    worldinfo = document.getElementById("worldinfo");
    btncn = document.getElementById('btn-cn');
    btnworld = document.getElementById('btn-world');



        cnmap.style.display = 'none';
    worldmap.style.display = 'block';
    cninfo.style.display = 'none';
    worldinfo.style.display = 'flex';
    btncn.className = 'button';
    btnworld.className = 'button btn-active';
    


    function showcn(e) {

        cnmap.style.display = 'block';
        worldmap.style.display = 'none';
        cninfo.style.display = 'flex';
        worldinfo.style.display = 'none';
        btncn.className = 'button btn-active';
        btnworld.className = 'button';
    }

    function showworld(e) {
        worldmap.style.display = 'block';
        cnmap.style.display = 'none';
        cninfo.style.display = 'none';
        worldinfo.style.display = 'flex';
        btncn.className = 'button';
        btnworld.className = 'button btn-active';
    }
</script>

</body></html>
