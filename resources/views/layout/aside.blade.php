 <!-- Sidebar Navigation Left -->
 <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

<!-- Logo -->
<div class="logo-sn ms-d-block-lg">
  <a class="pl-0 ml-0 text-center" href="index.html"> <img src="{{ asset('adminasset/img/logo.png')}}" alt="logo"> </a>
</div>

<!-- Navigation -->
<ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
  <!-- Home -->
  <li class="menu-item ">
    <a class="active" href="index.html">
      <span><i class="material-icons fs-16">home</i>Home </span>
    </a>

  </li>
  <!-- /Home -->
  <!-- Setup  -->
  <li class="menu-item">
    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#create" aria-expanded="false"
     aria-controls="tables">
      <span><i class="material-icons fs-16">build</i>Setup</span>
    </a>
    <ul id="create" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
      <li> <a href="_clients.html">Clients</a> </li>
      <li> <a href="_supplier.html">Suppliers</a> </li>
      <li> <a href="_ports.html">Ports</a> </li>
      <li> <a href="_carriers.html">Carriers</a> </li>
      <li> <a href="_agents.html" class="active">Agents</a> </li>
      <li> <a href="_expenses.html">Expenses</a> </li>
      <li> <a href="_containers.html">Containers </a> </li>
      <li> <a href="_employees.html">Employees </a> </li>
      <li> <a href="_bank_accounts.html">Bank Accounts</a> </li>
      <li> <a href="_currencies.html">Currencies</a> </li>
      <li> <a href="_countries.html">Countries</a> </li>
    </ul>
  </li>
  <!--  Setup  -->
  <!-- Price Lists  -->
  <li class="menu-item">
    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#basic-elements" aria-expanded="false"
     aria-controls="basic-elements">
      <span><i class="material-icons fs-16">assignment</i>Price Lists</span>
    </a>
    <ul id="basic-elements" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
      <li> <a href="_ocean_freight.html">Ocean Freight</a> </li>
      <li> <a href="_trucking_rates.html">Trucking Rates</a> </li>
      <li> <a href="_air_rates.html">Air Rates</a> </li>
    </ul>
  </li>
  <!--  Price Lists  -->
<!-- Sales  -->
<li class="menu-item">
  <a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdropdown" aria-expanded="false"
   aria-controls="contactsdropdown">
    <span><i class="material-icons fs-16">assignment</i>Sales</span>
  </a>
  <ul id="contactsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
    <li> <a href="_sales_quote.html">Sales Quote</a> </li>
 
  </ul>
  
</li>
<!-- Operations  --> 
<li class="menu-item">
<a href="#" class="has-chevron" data-toggle="collapse" data-target="#operationdropdown" aria-expanded="false"
   aria-controls="contactsdropdown">
  <span><i class="material-icons fs-16">assignment</i>Operations</span>
</a>
<ul id="operationdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">

<li> <a href="_operation.html">Operations</a> </li>

</ul>

</li>
</ul>


</aside>