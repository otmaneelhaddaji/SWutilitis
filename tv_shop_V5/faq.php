<?php
ob_start();
require_once "header.php";
include_once "data_model.php";
$product_arr = get_all_products();
?>

<div class="container mt-3">
<h4><strong>Frequently Asked Questions:</strong> </h4><br>
  <div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
        I have a product in warranty that has developed a fault. What can I do?
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
       <p> We will always help you out if your product develops a fault while under warranty.

For assistance, you can contact us in one of the following ways:

In store: Simply take your faulty product along with proof of purchase to your nearest South West Utilties LTD store.

Our colleagues in store will check your product and, depending on the manufacturer’s warranty policy, will either book your product in for repair or provide you with a replacement.

Over the phone: In the case of large products such as white goods and TVs, please call our contact centre on0844 561 1234 where our colleagues in Sheffield will arrange either a repair or exchange.

Online: If you purchased your product online, you can request a repair or exchange by logging into your personal account and selecting‘Ask a question’ and then following the‘Product support, returns & after-care service’ link.
        </p>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Do South West Utilties LTD do repairs?
      </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
        Computing: Bring your TV into one of our South West Utilties LTD stores with a Knowhow service bar for a free consultation. If you cannot make it into one of our stores, you can call us on 0344 561 1234 and we'll take it from there.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Can a damaged TV screen be repaired?
      </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
        A dying or cracked display doesn't mean your TV is a paperweight. For most TV, a screen replacement takes £80 and an hour of your time at most. If you're a DIYer, replacing a broken TV screen yourself is a great way to save cash, as most TV repair shops will quote you £150 to £300 for the job.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
        Do SW Utilties deliver on Saturdays?
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
        Currys and SW Utilties currently offer Saturday-only delivery; however a Sunday proposition with delivery between 2:30pm and 6:00pm will allow for more flexibility, suiting customers' busy 21st century lives, the company said.  Next day delivery starts from £4.99.
        </div>
      </div>
    </div>
  </div>
</div>

</div>
  
<?php
require_once "footer.php";
?>

