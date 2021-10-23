 <?php headerAdmin($data); ?>



 <!-- sidebar-wrapper -->
 <main class="page-content">
     <div class="container">
         <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070">
             <?php echo $data['page_title'] ?>
         </h2>
         <hr>

         <!-- partial:index.partial.html -->

         <div id="invoiceholder">

             <div id="headerimage"></div>
             <div id="invoice" class="effect2">

                 <div id="invoice-top">
                     <div class="logo"></div>
                     <div class="info">
                         <h2>Michael Truong</h2>
                         <p> hello@michaeltruong.ca </br>
                             289-335-6503
                         </p>
                     </div>
                     <!--End Info-->
                     <div class="title">
                         <h1>Invoice #1069</h1>
                         <p>Issued: May 27, 2015</br>
                             Payment Due: June 27, 2015
                         </p>
                     </div>
                     <!--End Title-->
                 </div>
                 <!--End InvoiceTop-->



                 <div id="invoice-mid">

                     <div class="clientlogo"></div>
                     <div class="info">
                         <h2>Client Name</h2>
                         <p>JohnDoe@gmail.com</br>
                             555-555-5555</br>
                     </div>

                     <div id="project">
                         <h2>Project Description</h2>
                         <p>Proin cursus, dui non tincidunt elementum, tortor ex feugiat enim, at elementum enim quam vel purus. Curabitur semper malesuada urna ut suscipit.</p>
                     </div>

                 </div>
                 <!--End Invoice Mid-->

                 <div id="invoice-bot">

                     <div id="table">
                         <table>
                             <tr class="tabletitle">
                                 <td class="item">
                                     <h2>Item Description</h2>
                                 </td>
                                 <td class="Hours">
                                     <h2>Hours</h2>
                                 </td>
                                 <td class="Rate">
                                     <h2>Rate</h2>
                                 </td>
                                 <td class="subtotal">
                                     <h2>Sub-total</h2>
                                 </td>
                             </tr>

                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Communication</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">5</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$75</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$375.00</p>
                                 </td>
                             </tr>

                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Asset Gathering</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">3</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$75</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$225.00</p>
                                 </td>
                             </tr>

                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Design Development</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">5</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$75</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$375.00</p>
                                 </td>
                             </tr>

                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Animation</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">20</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$75</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$1,500.00</p>
                                 </td>
                             </tr>

                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Animation Revisions</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">10</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$75</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$750.00</p>
                                 </td>
                             </tr>

                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext"></p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">HST</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">13%</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$419.25</p>
                                 </td>
                             </tr>


                             <tr class="tabletitle">
                                 <td></td>
                                 <td></td>
                                 <td class="Rate">
                                     <h2>Total</h2>
                                 </td>
                                 <td class="payment">
                                     <h2>$3,644.25</h2>
                                 </td>
                             </tr>

                         </table>
                     </div>
                     <!--End Table-->

                 </div>
                 <!--End InvoiceBot-->
             </div>
             <!--End Invoice-->
         </div><!-- End Invoice Holder-->
         <!-- partial -->


         <!--
        <form>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            Vehiculo
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <label>Placa</label>
                                    <input type="text" name="txtPlaca" required>
                                </div>

                                <div class="col-3">
                                    <label>Marca</label>
                                    <input class="w-100" type="text" name="txtMarca" required>

                                </div>

                                <div class="col-3">
                                    <label>Tipo</label>
                                    <input class="w-100" type="text" name="txtTipo" required>

                                </div>

                                <div class="col-3">
                                    <label>Línea</label>
                                    <input class="w-100" type="text" name="txtLinea" required>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        -->



     </div>




 </main>
 <!-- page-content" -->

 <?php footerAdmin($data); ?>