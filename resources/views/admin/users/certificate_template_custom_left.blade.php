<!DOCTYPE html>
<html><body>
<style>
    @font-face {
        font-family: 'open sans';
        src: url({{ storage_path('fonts\OpenSans-Regular-webfont.ttf') }}) format("truetype");
        font-weight: 400;
        font-style: normal;
    }
    *, html {
        box-sizing: border-box;
        font-family: "open sans", 'roboto', Verdana, Geneva, Tahoma, sans-serif;
        margin: 0;
        padding: 0;
    }
    html {
        margin: 5px 10px;
    }
    body {
        font-family: "open sans", 'roboto', Verdana, Geneva, Tahoma, sans-serif;
        font-size: 12px;
    }
    h1 {
        font-size: 45px;
    }
    h2 {
        font-size: 30px;
    }

    h3 {
        font-size: 25px;
    }
    h4 {
        font-size: 20px;
    }
    p {
        font-size: 16px;
    }
    .page_wrap {
        width: 100%;
        margin: 10px auto;
        padding: 5px;
        border: solid 7px orangered;
        min-height: 700px;
    }

    .inner_box {
        width: 100%;
        border: solid 7px #333;
        padding: 20px;
        height: 660px;
    }

    .top_section {
        width: 100%;
        height: 150px;
    }

    .main_section {
        text-align: center;
        padding: 30px 0;
        width: 100%;
        min-height: 300px;
        vertical-align: center;
    }

    .signature_section {
        width: 100%;
        min-height: 100px;
        background-color: #ccc;
        padding: 20px 30px;
    }

    .ribbon {
        float: left;
        width: 150px;
    }

    .ribbon img {
        width: 100%;
    }

    .signature {
        float: right;
        width: 300px;
        margin-top: 30px;
    }

    .signature_box {
        width: 100%;
        min-height: 100px;
        border-bottom: solid 2px #000;
    }

    .signature_info {
        width: 100%;
        height: auto;
        text-align: center;
    }

    .signature_info p {
        font-size: 18px;
    }
</style>


<div class="page_wrap">
	<div class="inner_box">
        <table border="0" width="100%">
            <tr>
                <td>
                    <div class="top_section">
                        <div class="logo">
                            <img src="{{ storage_path('images/averti-logo2.png') }}"/>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="main_section">
                        <h2>This is to Certify That</h2>
                        <h1>{{ $recipient_name }}</h1>
                        <br>
                        <h2>Successfully Participated in and completed</h2>
                        <h2>{{ $program_name }}</h2><br>
                        <h3>On</h3>
                        <h3>{{date('F Y',strtotime($program_date)) }}</h3>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="signature_section">
                        <div class="ribbon">
                            <img src="{{ storage_path('images/cert-ribbon.jpg') }}"/>
                        </div>

                        <div class="signature">
                            <div class="signature_box"></div>
                            <div class="signature_info">
                                <p>Director of Programs</p>
                                <p>Averti Professional Managers</p>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        
        
        

        
	</div>
</div>

</body>
</html>