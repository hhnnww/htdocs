<?php 
/**
 * Template name: 外宾进藏2
 */

get_header();?>

<style type="text/css">
    .lb-loader,
    .lightbox {
        text-align: center;
        line-height: 0
    }

    .lb-dataContainer:after,
    .lb-outerContainer:after {
        content: "";
        clear: both
    }

    html.lb-disable-scrolling {
        overflow: hidden;
        position: fixed;
        height: 100vh;
        width: 100vw
    }

    .lightboxOverlay {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 9999;
        background-color: #000;
        filter: alpha(Opacity=80);
        opacity: .8;
        display: none
    }

    .lightbox {
        position: absolute;
        left: 0;
        width: 100%;
        z-index: 10000;
        font-weight: 400
    }

    .lightbox .lb-image {
        display: block;
        height: auto;
        max-width: inherit;
        max-height: none;
        border-radius: 3px;
        border: 4px solid #fff
    }

    .lightbox a img {
        border: none
    }

    .lb-outerContainer {
        position: relative;
        width: 250px;
        height: 250px;
        margin: 0 auto;
        border-radius: 4px;
        background-color: #fff
    }

    .lb-loader,
    .lb-nav {
        position: absolute;
        left: 0
    }

    .lb-outerContainer:after {
        display: table
    }

    .lb-loader {
        top: 43%;
        height: 25%;
        width: 100%
    }

    .lb-cancel {
        display: block;
        width: 32px;
        height: 32px;
        margin: 0 auto;
        background: url(../images/loading.gif) no-repeat
    }

    .lb-nav {
        top: 0;
        height: 100%;
        width: 100%;
        z-index: 10
    }

    .lb-container>.nav {
        left: 0
    }

    .lb-nav a {
        outline: 0;
        background-image: url(data:image/gif;base64,R0lGODlhAQABAPAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==)
    }

    .lb-next,
    .lb-prev {
        height: 100%;
        cursor: pointer;
        display: block
    }

    .lb-nav a.lb-prev {
        width: 34%;
        left: 0;
        float: left;
        background: url(../images/prev.png) left 48% no-repeat;
        filter: alpha(Opacity=0);
        opacity: 0;
        -webkit-transition: opacity .6s;
        -moz-transition: opacity .6s;
        -o-transition: opacity .6s;
        transition: opacity .6s
    }

    .lb-nav a.lb-prev:hover {
        filter: alpha(Opacity=100);
        opacity: 1
    }

    .lb-nav a.lb-next {
        width: 64%;
        right: 0;
        float: right;
        background: url(../images/next.png) right 48% no-repeat;
        filter: alpha(Opacity=0);
        opacity: 0;
        -webkit-transition: opacity .6s;
        -moz-transition: opacity .6s;
        -o-transition: opacity .6s;
        transition: opacity .6s
    }

    .lb-nav a.lb-next:hover {
        filter: alpha(Opacity=100);
        opacity: 1
    }

    .lb-dataContainer {
        margin: 0 auto;
        padding-top: 5px;
        width: 100%;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px
    }

    .lb-dataContainer:after {
        display: table
    }

    .lb-data {
        padding: 0 4px;
        color: #ccc
    }

    .lb-data .lb-details {
        width: 85%;
        float: left;
        text-align: left;
        line-height: 1.1em
    }

    .lb-data .lb-caption {
        font-size: 13px;
        font-weight: 700;
        line-height: 1em
    }

    .lb-data .lb-caption a {
        color: #4ae
    }

    .lb-data .lb-number {
        display: block;
        clear: left;
        padding-bottom: 1em;
        font-size: 12px;
        color: #999
    }

    .lb-data .lb-close {
        display: block;
        float: right;
        width: 30px;
        height: 30px;
        background: url(../images/close.png) top right no-repeat;
        text-align: right;
        outline: 0;
        filter: alpha(Opacity=70);
        opacity: .7;
        -webkit-transition: opacity .2s;
        -moz-transition: opacity .2s;
        -o-transition: opacity .2s;
        transition: opacity .2s
    }

    .lb-data .lb-close:hover {
        cursor: pointer;
        filter: alpha(Opacity=100);
        opacity: 1
    }

</style>


<div class="box box-pic">
    <div class="container">
        <div class="box-header">
            <h1>每年为8万+海外游客<br>成功办理入藏函</h1>
            <h2><a class="cu-btn">办证电话：<b>132-9898-0618</b>（同微信）</a></h2>
        </div>
        <div class="box-content">
            <svg t="1522029356642" class="icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1908" data-spm-anchor-id="a313x.7781069.0.i0"><path d="M693.76 396.8L512 578.56l-181.76-181.76c-10.24-10.24-25.6-10.24-35.84 0-10.24 10.24-10.24 25.6 0 35.84l197.12 197.12c5.12 5.12 15.36 7.68 23.04 7.68 7.68 2.56 15.36 0 23.04-7.68l197.12-197.12c10.24-10.24 10.24-25.6 0-35.84-15.36-10.24-30.72-10.24-40.96 0zM512 102.4C286.72 102.4 102.4 286.72 102.4 512s184.32 409.6 409.6 409.6 409.6-184.32 409.6-409.6S737.28 102.4 512 102.4z m0 768c-197.12 0-358.4-161.28-358.4-358.4S314.88 153.6 512 153.6s358.4 161.28 358.4 358.4-161.28 358.4-358.4 358.4z" p-id="1909"></path></svg>向下滚动，查看更多。</span>
        </div>
    </div>
</div>

<div class="box box-md">
    <div class="container">
        <div class="box-header">
            <h1>西藏中青旅办入藏函<br />速度快 100%成功</h1>
        </div>
        <div class="box-content">
            <ul>
                <li>
                    <div class="li-pic"><svg style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 79 96" xmlns="http://www.w3.org/2000/svg"><title>global/illustrations/features/lightning-speed</title><g fill="none"><path d="M79.1 23.2l-2.9 2.9-2.6-2.6-2.7 2.6-2.9-2.9 2.7-2.6-2.7-2.7 2.9-2.9 2.7 2.7 2.6-2.7 2.9 2.9-2.6 2.7 2.6 2.6zm-65 66l-2.9 2.9-2.6-2.6-2.7 2.6L3 89.2l2.7-2.6L3 83.9 5.9 81l2.7 2.7 2.6-2.7 2.9 2.9-2.6 2.7 2.6 2.6z" fill="#D0D1D2"></path><path d="M59.45 52.297L74 36.554H43.727L54.576 11H16.455L0 56.743h25.788L19.06 96l17.567-19.008A20.037 20.037 0 0 1 36 71.776L25.283 83.374l5.249-30.63H5.69L19.267 15h29.265L37.684 40.554h27.173L54.205 52.08a20.257 20.257 0 0 1 5.246.218z" fill="#151922"></path><path d="M56 88c8.837 0 16-7.163 16-16s-7.163-16-16-16-16 7.163-16 16 7.163 16 16 16zm1.3-24h-2.7v-4h2.7v4zm6.7 6.7h4v2.7h-4v-2.7zM52 72c0-2.2 1.8-4 4-4 .6 0 1.2.2 1.7.4l5.9-5.9 1.9 1.9-5.9 5.9c.2.5.4 1.1.4 1.7 0 2.2-1.8 4-4 4s-4-1.8-4-4zm-2.6-4.7l-2.8-2.8 1.9-1.9 2.8 2.8-1.9 1.9zm-5.4 6v-2.7h4v2.7h-4z" fill="#F64F64"></path></g></svg></div>
                    <div class="li-title"><b>急件</b>最快3天办好，快如闪电</div>
                </li>
                <li>
                    <div class="li-pic"><svg style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 92 96" xmlns="http://www.w3.org/2000/svg"><title>global/illustrations/features/dedicated-ip-address</title><g fill="none" fill-rule="evenodd"><path d="M60.736 15.599a16.541 16.541 0 0 0-1.547 4.904C55.85 14.821 51.612 11.047 47 10.192V27.5h12.592c.37 1.373.91 2.718 1.622 4H47V49h19.473a71.695 71.695 0 0 0-1.467-12.731l4.87 4.808c.326 2.565.528 5.213.596 7.923h15.477c.032.663.051 1.329.051 2s-.019 1.337-.051 2H70.472c-.156 6.248-1.029 12.167-2.484 17.5h13.071a41.081 41.081 0 0 1-2.493 4H66.748c-2.218 6.377-5.311 11.698-8.984 15.455a40.838 40.838 0 0 1-25.528 0c-3.672-3.757-6.766-9.078-8.984-15.455H11.434a41.081 41.081 0 0 1-2.493-4h13.071c-1.455-5.333-2.328-11.252-2.484-17.5H4.051A41.449 41.449 0 0 1 4 51c0-.671.019-1.337.051-2h15.477c.156-6.248 1.029-12.167 2.484-17.5H8.941a41.081 41.081 0 0 1 2.493-4h11.818c2.218-6.377 5.312-11.698 8.984-15.455a40.838 40.838 0 0 1 25.528 0 31.177 31.177 0 0 1 2.972 3.554zM63.817 70.5c1.54-5.28 2.489-11.23 2.656-17.5H47v17.5h16.817zM47 91.808c6.309-1.17 11.918-7.801 15.484-17.308H47v17.308zM43 27.5V10.192c-6.309 1.17-11.918 7.801-15.484 17.308H43zM43 49V31.5H26.183c-1.54 5.28-2.489 11.23-2.656 17.5H43zm0 21.5V53H23.527c.167 6.27 1.116 12.22 2.656 17.5H43zm0 21.308V74.5H27.516C31.082 84.007 36.691 90.638 43 91.808z" fill="#D0D1D2"></path><path d="M64.659 10.51A44.82 44.82 0 0 0 45 6C20.147 6 0 26.147 0 51s20.147 45 45 45 45-20.147 45-45c0-4.522-.667-8.889-1.908-13.007l-3.27 3.229A40.953 40.953 0 0 1 86 51c0 22.607-18.393 41-41 41S4 73.607 4 51s18.393-41 41-41a40.762 40.762 0 0 1 16.886 3.64 16.929 16.929 0 0 1 2.773-3.13z" fill="#151922"></path><path d="M87.39 13.38c-5.377-5.84-14.628-5.84-19.937 0-5.937 5.096-5.937 14.092 0 19.685l9.969 9.842 9.968-9.842c5.96-5.593 5.96-14.589 0-19.684zm-9.968 14.316c-2.538 0-4.532-1.968-4.532-4.473 0-2.506 1.994-4.474 4.532-4.474 2.537 0 4.53 1.968 4.53 4.474 0 2.505-1.993 4.473-4.53 4.473z" fill="#F64F64" fill-rule="nonzero"></path></g></svg></div>
                    <div class="li-title"><b>难件</b>不同国籍同团复杂办理</div>
                </li>
                <li>
                    <div class="li-pic"><svg style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 89 96" xmlns="http://www.w3.org/2000/svg"><title>global/illustrations/features/easiest-vpn-ever</title><g fill="none"><path d="M42 1h4v10h-4V1zM10 43v4H0v-4h10zm79 0v4H79v-4h10zM20 18.14l-2.828 2.829-7.071-7.071 2.828-2.829L20 18.14z" fill="#D0D1D2"></path><path d="M34 84h21v4H34v-4zm3 8h15v4H37v-4zm32.3-52.2c1.4-.2 2.7-.6 3.9-1.1.5 2.2.8 4.5.8 6.8 0 11.8-7 22-17 26.7V80H32v-7.8c-10-4.7-17-14.9-17-26.7C15 29.2 28.2 16 44.5 16.1c1.5 0 2.9.1 4.3.3-.4 1.2-.6 2.5-.7 3.9-1.2-.2-2.4-.3-3.6-.3C30.4 20 19 31.4 19 45.5c0 9.8 5.8 18.9 14.7 23.1l2.3 1.1V76h17v-6.3l2.3-1.1C64.2 64.4 70 55.3 70 45.5c0-1.9-.3-3.9-.7-5.7zM51.1 60.7L45 55.6l-6.1 5.1-8.3-8.3 2.8-2.8 5.7 5.7 5.9-4.9 5.9 4.9 5.7-5.7 2.8 2.8-8.3 8.3z" fill="#151922"></path><path d="M66.5 36C58.492 36 52 29.508 52 21.5S58.492 7 66.5 7 81 13.492 81 21.5 74.508 36 66.5 36zm-1.8-13.2l-3.6-3.6-2.1 2.1 3.5 3.6 2.2 2.1 9.1-9.2-2.1-2.1-7 7.1z" fill="#F64F64"></path></g></svg></div>
                    <div class="li-title"><b>台湾籍游客</b>入藏函照常轻松办理</div>
                </li>

            </ul>
        </div>
    </div>
</div>

<div class="box box-cp">
    <div class="container">
        <div class="box-header">
            <h1>外国游客 拼车线路</h1>
            <h2>针对海外游客精选订制线路</h2>
        </div>
        <div class="box-content">
            <ul>
                <?php home_cp_list('1630');?>
                <?php home_cp_list('1654');?>
                <?php home_cp_list('1352');?>
                <?php home_cp_list('1505');?>
                <?php home_cp_list('1693');?>
                <?php home_cp_list('1451');?>
            </ul>
        </div>
    </div>
</div>

<div class="box box-lc">
    <div class="container">
        <div class="box-header">
            <h1>入藏函办理流程</h1>
            <h2>Registration process</h2>
        </div>
        <div class="box-content">
            <ul>
                <li>
                    <div class="li-pic">
                        <svg t="1522031235220" class="icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2617" data-spm-anchor-id="a313x.7781069.0.i2"><path d="M513.783623 130.208551c-152.644539 0-281.283338 105.779162-322.692447 250.269997-37.023218 22.295795-58.671261 65.240887-58.671261 115.508757 0 72.89931 44.443212 132.010593 117.342522 132.010593 16.222473 0 29.335119-13.112646 29.335119-29.335119l0-205.349925c0-13.494339-9.578146-24.085558-22.002107-27.502377 42.832528-105.136525 141.707442-178.76443 256.68715-178.76443 114.979708 0 213.854623 73.627904 256.68715 178.76443-12.422937 3.416819-22.002107 14.008039-22.002107 27.502377l0 205.349925c0 16.222473 13.112646 29.335119 29.335119 29.335119 6.825452 0 12.93766-0.833995 19.25146-1.833765-9.488095 54.739718-32.476669 95.531773-55.920614 123.759675-14.622022 17.605983-29.616528 30.364565-41.253566 38.502919-5.818519 4.069689-10.344602 6.597255-13.751189 8.250918-1.703805 0.826831-3.096525 1.581008-3.666506 1.833765l-55.003731 0c-10.564613-30.631648-44.185338-53.17099-84.339874-53.17099-48.604998 0-88.007403 32.834826-88.007403 73.339332s39.402405 73.339332 88.007403 73.339332c40.154535 0 73.77526-22.540366 84.339874-53.17099l57.754379 0c9.915837 0 12.437264-2.638083 18.334577-5.500271 5.897314-2.862187 12.82612-6.782473 20.168342-11.917424 14.683421-10.269901 32.402991-25.247011 49.503461-45.836955 30.928407-37.238113 59.728336-92.562139 66.922179-166.847006 34.589796-22.957875 55.003731-64.293305 55.003731-112.75811 0-50.268894-21.648043-93.213985-58.671261-115.508757C795.067984 235.987712 666.428162 130.208551 513.783623 130.208551z" p-id="2618"></path></svg>
                    </div>
                    <div class="li-title">联系客服</div>
                    <div class="li-content">通过电话或微信与我们联系<span>132-9898-0618（同微信）</span>与我们办证专员联系</div>
                </li>
                <li>
                    <div class="li-pic">
                        <svg t="1522031730220" class="icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2901" data-spm-anchor-id="a313x.7781069.0.i4"><path d="M938.666667 448V192.042667A42.666667 42.666667 0 0 0 896.042667 149.333333H768v42.666667l128 0.042667V405.333333H128V192.042667L256 192V149.333333H127.957333A42.56 42.56 0 0 0 85.333333 192.042667v703.914666A42.666667 42.666667 0 0 0 127.936 938.666667H490.666667v-42.688l-362.666667-0.021334V448h810.666667zM298.666667 85.333333h42.666666v170.666667h-42.666666V85.333333z m384 0h42.666666v170.666667h-42.666666V85.333333zM384 149.333333h256v42.666667H384V149.333333z" fill="#3D3D3D" p-id="2902"></path><path d="M746.666667 917.333333a170.666667 170.666667 0 1 0 0-341.333333 170.666667 170.666667 0 0 0 0 341.333333z m0 42.666667c-117.824 0-213.333333-95.509333-213.333334-213.333333s95.509333-213.333333 213.333334-213.333334 213.333333 95.509333 213.333333 213.333334-95.509333 213.333333-213.333333 213.333333z" fill="#3D3D3D" p-id="2903"></path><path d="M768 759.232v-119.296c0-11.605333-9.557333-21.269333-21.333333-21.269333-11.861333 0-21.333333 9.514667-21.333334 21.269333v128.128a20.992 20.992 0 0 0 6.101334 14.933333l60.629333 60.629334a21.184 21.184 0 0 0 30.016-0.149334 21.333333 21.333333 0 0 0 0.149333-30.016L768 759.232z" fill="#3D3D3D" p-id="2904"></path></svg>
                    </div>
                    <div class="li-title">确定行程</div>
                    <div class="li-content">与我们确定西藏旅游的<span>行程，天数、人数、旅行路线</span>等详细情况。</div>
                </li>
                <li>
                    <div class="li-pic">
                        <svg t="1522031878200" class="icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3588"><path d="M235.039619 808.906154c-28.9084 0-49.927109-23.754007-49.927109-52.922327L185.11251 529.367553c0-7.370875-5.977132-13.328563-13.334703-13.328563-7.370875 0-13.334703 5.957689-13.334703 13.328563l0 226.617297c0 43.884486 32.984229 79.589686 76.595492 79.589686 7.357572 0 13.334703-5.963829 13.334703-13.334703C248.374322 814.871005 242.397191 808.906154 235.039619 808.906154z" p-id="3589"></path><path d="M300.110637 809.400411l-13.334703 0c-7.357572 0-13.334703 5.963829-13.334703 13.334703s5.977132 13.334703 13.334703 13.334703l13.334703 0c7.370875 0 13.334703-5.963829 13.334703-13.334703S307.481512 809.400411 300.110637 809.400411z" p-id="3590"></path><path d="M866.090039 489.369583l-54.250578 0L811.839461 367.443673c0-41.702798-31.800263-76.978209-71.643714-87.919399 0.827855-4.559852 0.481977-9.392928-1.254573-14.049994l-57.543577-154.369833c-2.474354-6.628978-7.475252-12.006452-13.908778-14.94334-6.445806-2.936889-13.776771-3.210112-20.404726-0.723477L185.269076 267.830955c-4.628414 1.727341-8.487302 4.604878-11.385305 8.184403l-21.364587 0c-50.968835 0-87.416955 41.019229-87.416955 91.428316l0 468.548372c0 51.515281 36.449143 93.420693 87.416955 93.420693l561.889247 0c50.968835 0 97.43103-41.905412 97.43103-93.420693L811.839461 729.392192l54.250578 0c51.046606 0 92.430132-41.383526 92.430132-92.429109L958.520171 581.800739C958.520171 530.74697 917.136645 489.369583 866.090039 489.369583zM640.742664 154.73413l45.203528 121.281227L315.844993 276.015358 640.742664 154.73413zM758.501672 835.992045c0 21.721721-22.906709 40.080857-44.093241 40.080857L152.519184 876.072903c-21.187555 0-34.079166-18.359137-34.079166-40.080857L118.440018 367.443673c0-21.3564 12.163017-38.089503 34.079166-38.089503l561.889247 0c21.916149 0 44.093241 16.733103 44.093241 38.089503l0 121.92591L677.582711 489.369583c-51.04763 0-92.431156 41.378409-92.431156 92.431156l0 55.162344c0 51.045583 41.383526 92.429109 92.431156 92.429109l80.918961 0L758.501672 835.992045zM905.182382 636.963083c0 21.589714-17.502629 39.09132-39.092343 39.09132L677.582711 676.054403c-21.591761 0-39.092343-17.502629-39.092343-39.09132L638.490368 581.800739c0-21.589714 17.501606-39.099507 39.092343-39.099507l188.507328 0c21.590737 0 39.092343 17.509792 39.092343 39.099507L905.182382 636.963083z" p-id="3591" data-spm-anchor-id="a313x.7781069.0.i7"></path><path d="M705.723631 582.815859c-14.116509 0-25.562189 11.460006-25.562189 25.576515 0 14.114462 11.446703 25.548886 25.562189 25.548886 14.102183 0 25.561166-11.434423 25.561166-25.548886C731.284797 594.275865 719.825814 582.815859 705.723631 582.815859z" p-id="3592"></path></svg>
                    </div>
                    <div class="li-title">支付定金</div>
                    <div class="li-content">支付前期定金，金额视行程情况的总金额，在500-2000之间。</div>
                </li>
                <li>
                    <div class="li-pic">
                        <svg t="1522031915332" class="icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3854" data-spm-anchor-id="a313x.7781069.0.i9"><path d="M950.8864 146.3296c21.2992 0 38.8096 6.8608 52.5312 20.5824C1017.1392 180.5312 1024 198.0416 1024 219.4432l0 585.1136c0 21.4016-6.8608 38.8096-20.5824 52.5312C989.696 870.8096 972.1856 877.6704 950.8864 877.6704L73.1136 877.6704c-21.2992 0-38.8096-6.8608-52.5312-20.5824C6.8608 843.4688 0 825.9584 0 804.5568L0 219.4432c0-21.2992 6.8608-38.912 20.5824-52.5312 13.7216-13.7216 31.232-20.5824 52.5312-20.5824l365.6704 0 0-128C438.8864 6.144 444.928 0 457.1136 0l109.6704 0c12.1856 0 18.3296 6.144 18.3296 18.3296l0 128L950.8864 146.3296zM987.4432 219.4432c0-24.3712-12.1856-36.5568-36.5568-36.5568L585.1136 182.8864l0 54.8864c0 12.288-6.144 18.3296-18.3296 18.3296L457.1136 256.1024c-12.1856 0-18.3296-6.0416-18.3296-18.3296L438.784 182.8864 73.1136 182.8864c-24.3712 0-36.5568 12.288-36.5568 36.5568l0 585.1136c0 24.3712 12.1856 36.5568 36.5568 36.5568l877.6704 0c24.3712 0 36.5568-12.1856 36.5568-36.5568L987.3408 219.4432zM438.8864 676.5568c0-35.0208-12.5952-65.1264-37.6832-90.3168S345.9072 548.5568 310.8864 548.5568 245.76 561.152 220.5696 586.24 182.8864 641.536 182.8864 676.5568c0 12.288-6.144 18.3296-18.3296 18.3296S146.3296 688.8448 146.3296 676.5568c0-45.6704 15.9744-84.5824 48.0256-116.5312C226.304 527.9744 265.1136 512 310.8864 512c45.6704 0 84.5824 15.9744 116.5312 48.0256 31.9488 31.9488 48.0256 70.8608 48.0256 116.5312 0 12.288-6.144 18.3296-18.3296 18.3296S438.8864 688.8448 438.8864 676.5568zM374.8864 484.5568C356.5568 502.8864 335.2576 512 310.8864 512S265.1136 502.8864 246.8864 484.5568 219.4432 444.928 219.4432 420.5568c0-24.3712 9.1136-45.6704 27.4432-64s39.6288-27.4432 64-27.4432 45.6704 9.1136 64 27.4432S402.3296 396.288 402.3296 420.5568C402.3296 444.928 393.1136 466.3296 374.8864 484.5568zM349.696 381.7472C339.0464 371.0976 326.144 365.6704 310.8864 365.6704c-15.2576 0-28.16 5.4272-38.8096 15.9744C261.3248 392.3968 256 405.4016 256 420.5568c0 15.2576 5.3248 28.2624 15.9744 38.8096C282.624 470.1184 295.6288 475.4432 310.8864 475.4432c15.2576 0 28.16-5.3248 38.8096-15.9744 10.6496-10.6496 15.9744-23.6544 15.9744-38.8096C365.6704 405.4016 360.3456 392.3968 349.696 381.7472zM475.4432 219.4432l73.1136 0L548.5568 36.5568 475.4432 36.5568 475.4432 219.4432zM859.4432 365.6704l-256 0c-12.1856 0-18.3296-6.0416-18.3296-18.3296 0-12.1856 6.144-18.3296 18.3296-18.3296l256 0c12.1856 0 18.3296 6.144 18.3296 18.3296C877.6704 359.6288 871.6288 365.6704 859.4432 365.6704zM859.4432 475.4432l-256 0c-12.1856 0-18.3296-6.0416-18.3296-18.3296 0-12.1856 6.144-18.3296 18.3296-18.3296l256 0c12.1856 0 18.3296 6.144 18.3296 18.3296C877.6704 469.4016 871.6288 475.4432 859.4432 475.4432zM859.4432 585.1136l-256 0c-12.1856 0-18.3296-6.0416-18.3296-18.3296 0-12.1856 6.144-18.3296 18.3296-18.3296l256 0c12.1856 0 18.3296 6.144 18.3296 18.3296C877.6704 579.072 871.6288 585.1136 859.4432 585.1136zM859.4432 694.8864l-256 0c-12.1856 0-18.3296-6.0416-18.3296-18.3296 0-12.1856 6.144-18.3296 18.3296-18.3296l256 0c12.1856 0 18.3296 6.144 18.3296 18.3296C877.6704 688.8448 871.6288 694.8864 859.4432 694.8864z" p-id="3855"></path></svg>
                    </div>
                    <div class="li-title">办理入藏函</div>
                    <div class="li-content">由我们为您成功办理入藏函<br><span>我们将入藏函邮寄到您手中</span><br>待到出行日期成功进藏。</div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="box box-zl">
    <div class="container">
        <div class="box-header">
            <h1>办理入藏函所需要的资料</h1>
            <h2>The information required to handle the Tibet letter</h2>
        </div>
        <div class="box-content">
            <ul>
                <li>
                    <div class="li-pic"><a data-lightbox="box-zl" href="https://www.inxizang.com/rzhzt/img/9.jpg"><img src="https://www.inxizang.com/rzhzt/img/9.jpg"></a></div>
                    <div class="li-title">外国人</div>
                    <div class="li-content">外国人需要提供<span>护照首页照片，签证首页照片</span>照片需要完整清晰。</div>
                </li>
                <li>
                    <div class="li-pic"><a data-lightbox="box-zl" href="https://www.inxizang.com/rzhzt/img/10.jpg"><img src="https://www.inxizang.com/rzhzt/img/10.jpg"></a></div>
                    <div class="li-title">台湾人</div>
                    <div class="li-content">台湾人需要提供<span>台胞证照片</span><span>卡片式正反面照片</span><span>本式首页的照片</span></div>
                </li>
                <li>
                    <div class="li-pic"><a data-lightbox="box-zl" href="https://www.inxizang.com/rzhzt/img/11.jpg"><img src="https://www.inxizang.com/rzhzt/img/11.jpg"></a></div>
                    <div class="li-title">在中国读书或工作的外国人</div>
                    <div class="li-content">在大陆工作的外国人需提供<span>工作证明</span>在中国读书的需要<span>学校证明</span>台湾人不需要提供工作证明。</div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="box box-zs">
    <div class="container">
        <div class="box-header">
            <h1>最近30天成功办理入藏函图片展示</h1>
            <h2>提前30天办理入藏函最高可享受2000元/人优惠</h2>
        </div>
        <div class="box-content">
            <ul>
                <li><a data-lightbox="zs1" href="https://www.inxizang.com/rzhzt/img/1.jpg"><img src="https://www.inxizang.com/rzhzt/img/1.jpg" /></a></li>
                <li><a data-lightbox="zs1" href="https://www.inxizang.com/rzhzt/img/2.jpg"><img src="https://www.inxizang.com/rzhzt/img/2.jpg" /></a></li>
                <li><a data-lightbox="zs1" href="https://www.inxizang.com/rzhzt/img/3.jpg"><img src="https://www.inxizang.com/rzhzt/img/3.jpg" /></a></li>
                <li><a data-lightbox="zs1" href="https://www.inxizang.com/rzhzt/img/4.jpg"><img src="https://www.inxizang.com/rzhzt/img/4.jpg" /></a></li>
                <li><a data-lightbox="zs1" href="https://www.inxizang.com/rzhzt/img/5.jpg"><img src="https://www.inxizang.com/rzhzt/img/5.jpg" /></a></li>
                <li><a data-lightbox="zs1" href="https://www.inxizang.com/rzhzt/img/6.jpg"><img src="https://www.inxizang.com/rzhzt/img/6.jpg" /></a></li>
                <li><a data-lightbox="zs1" href="https://www.inxizang.com/rzhzt/img/7.jpg"><img src="https://www.inxizang.com/rzhzt/img/7.jpg" /></a></li>
                <li><a data-lightbox="zs1" href="https://www.inxizang.com/rzhzt/img/8.jpg"><img src="https://www.inxizang.com/rzhzt/img/8.jpg" /></a></li>
            </ul>
        </div>
    </div>
</div>
<?php get_footer();?>
<script src="https://www.inxizang.com/rzhzt/lightbox/js/lightbox-plus-jquery.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'speed': 0
    })

</script>
