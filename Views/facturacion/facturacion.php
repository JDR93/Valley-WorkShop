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
                         <h2>Valley WorkShop</h2>
                         <p> valleworkshop@gmail.com </br>
                             289-335-6503
                         </p>
                     </div>
                     <!--End Info-->
                     <div class="title">
                         <h1>Factura#1069</h1>
                         <p>Generada: Noviembre 27, 2021</br>
                             Fecha de Pago: Diciembre 12, 2021
                         </p>
                     </div>
                     <!--End Title-->
                 </div>
                 <!--End InvoiceTop-->



                 <div id="invoice-mid">

                     <div class="clientlogo"></div>
                     <div class="info">
                         <h2>Nombre del cliente</h2>
                         <p>clientecorreo@gmail.com</br>
                             555-555-5555</br>
                     </div>

                     <div id="project">
                         <h2>Descripcion de la factura</h2>
                         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut laboriosam animi consectetur optio illum. Officiis recusandae autem accusantium reiciendis illo.</p>
                     </div>

                 </div>
                 <!--End Invoice Mid-->

                 <div id="invoice-bot">

                     <div id="table">
                         <table>
                             <tr class="tabletitle">
                                 <td class="item">
                                     <h2>Servicio solicitado</h2>
                                 </td>
                                 <td class="Hours">
                                     <h2>Costo</h2>
                                 </td>
                                 <td class="Rate">
                                     <h2>Cantidad</h2>
                                 </td>
                                 <td class="subtotal">
                                     <h2>Sub-total</h2>
                                 </td>
                             </tr>

                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Servicio de ejemplificacion 1</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$45.000</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">1</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$45.000</p>
                                 </td>
                             </tr>

                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Servicio de ejemplificacion 2</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$32.500</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">2</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$65.000</p>
                                 </td>
                             </tr>
                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Servicio de ejemplificacion 3</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$410.000</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$1</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$410.000</p>
                                 </td>
                             </tr>
                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Servicio de ejemplificacion 4</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$125.000</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">1</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$125.000</p>
                                 </td>
                             </tr>
                             <tr class="service">
                                 <td class="tableitem">
                                     <p class="itemtext">Servicio de ejemplificacion 5</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$21.200</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$2</p>
                                 </td>
                                 <td class="tableitem">
                                     <p class="itemtext">$42.400</p>
                                 </td>
                             </tr>
                             

                             <tr class="tabletitle">
                                 <td></td>
                                 <td></td>
                                 <td class="Rate">
                                     <h2>Total</h2>
                                 </td>
                                 <td class="payment">
                                     <h2>$687.400</h2>
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