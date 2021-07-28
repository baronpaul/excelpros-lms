<!DOCTYPE html>
<html><body>
<style>
  h1, h2, h3, h4 {
    margin: 0;
    padding: 0;
  }
  td {
    padding: 8px;
    border-bottom: solid 1px #ccc;
    vertical-align: text-top;
  }

  li {
    margin: 7px 0;
  }

  .box {
    padding: 15px;
  }

  .box h4 {
    margin: 5px 0;
    padding: 0;
  }

  .box p {
    margin: 0 0 5px;
  }
</style>
<table width="100%" border="0">
  <tr>
    <td>
        
      <div style="width:80%; margin:30px auto">
        
        <h2>Invoice</h2>
        <h3>Date Issued: <?php echo date('m/d/Y') ?></h3><br>
        <hr><br>
        <table width="100%" style="vertical-align: text-top;">
          <tr>
            <td width="70%"><h4>Package</h4></td>
            <td width="30%"><h4>Cost</h4></td>
          </tr>

          <tr>
            <td>
              <p>Design and development of a basic portfolio website with the following features:</p>
              <ul style="list-style-type: square; margin-left: 20px; padding-left: 0">
                  <li>Responsive web design</li>
                  <li>Upto 5 bespoke web pages</li>
                  <li>Free Domain name & hosting for 1 yr</li>
                  <li>Contact form to email</li>
                  <li>Upto 20 email email accounts</li>
                  <li>1 months technical support</li>
                  <li>On page SEO</li>
              </ul>
            </td>
            <td>N55,000.00</td>
          </tr>

          <tr>
            <td><h4>Total</h4></td>
            <td><h4>N55,000.00</h4></td>
          </tr>
        </table>

        <div class="box">
          <h4>Project Duration:</h4>
          <p>The project delivery timeline is 10 working days from the date payment is confirmed.</p>
        </div>

        <div class="box">
          <h4>Payment Schedule:</h4>
          <p>
            First Installment: N33,000.00<br>
            Second Installment: N22,000.00
          </p>
        </div>

        <div class="box">
          <h4>Payment Details:</h4>
          <p>Please make payment to:</p>
          <p>
            Access Bank PLC<br>
            Account Number: 0734806642<br>
            Account Name: Paul Anyiam
          </p>
        </div>
      </div>
    </td>
  </tr>
</table>

</body>
</html>
