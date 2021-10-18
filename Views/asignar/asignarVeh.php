<script>
    // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
    $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({
            'padding-right': scrollWidth
        });
    }).resize();
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <section>
                <div class="cont container-title-left">
                    <h2>Mantenimiento <p style="color: #FA4B61;">sin mecanico</p> asignado</h2>
                </div>
                <div class="tbl-header">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Company</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="tbl-content">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td>AAC</td>
                                <td>AUSTRALIAN COMPANY </td>
                                <td>$1.38</td>

                            </tr>
                            <tr>
                                <td>AAC</td>
                                <td>AUSTRALIAN COMPANY </td>
                                <td>$1.38</td>

                            </tr>
                            <tr>
                                <td>AAC</td>
                                <td>AUSTRALIAN COMPANY </td>
                                <td>$1.38</td>

                            </tr>
                            <tr>
                                <td>AAC</td>
                                <td>AUSTRALIAN COMPANY </td>
                                <td>$1.38</td>

                            </tr>
                            <tr>
                                <td>AAC</td>
                                <td>AUSTRALIAN COMPANY </td>
                                <td>$1.38</td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <label for=""></label>
                    <textarea class="jlist form-control" name="" id="" rows="3" readonly></textarea>
                </div>
            </section>


        </div>

        <div class="col-6">

            <section>
                <div class="cont container-title-right">
                    <h2>Mantenimiento <p style="color: #38B2DF;">con mecanico</p> asignado</h2>
                </div>
                <div class="tbl-header">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Company</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="tbl-content">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td>AAC</td>
                                <td>AUSTRALIAN COMPANY </td>
                                <td>$1.38</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <textarea class="jlist form-control" name="" id="" rows="3" readonly></textarea>
                </div>
            </section>
        </div>
    </div>

    <div class="row text-center col-12 conteiner-buttom">

        <div class="col-2">
            <h4 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 1em; font-weight: bold; padding-top: .5em; ">Mecanicos:</h4>
        </div>

        <div class="col-6">
            <div class="form-group">
                <select class="form-control" name="" id="">
                    <option></option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="conteiner-buttons row justify-content-around">
                <a name="" id="" class="btn btn-primary col-5" href="#" role="button">Actualizar</a>
                <a name="" id="" class="btn btn-primary col-5" href="#" role="button">Asignar mecanico</a>

            </div>
        </div>
    </div>



</div>