@extends('layouts.app')

@section('content')
    <section class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h2 class="h2_caption text-center">
                    <span>Søg</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0.39999961853027344 0 199.1125946044922 199.90000915527344" role="img" preserveAspectRatio="xMidYMid meet" style="stroke-width: 0px; width: 21px; height: 21px; fill: #734A2B;">
                        <g>
                            <path d="M195.4 175.1l-56.1-56.2c19.9-29.6 16.8-70.3-9.3-96.5C115.7 7.9 96.7 0 76.4 0 56.1 0 37 7.9 22.6 22.3-7 52.1-7 100.4 22.6 130.1c14.3 14.4 33.4 22.3 53.7 22.3 15.3 0 29.9-4.5 42.3-12.9l56 56.2c2.7 2.7 6.2 4.2 10 4.2s7.3-1.5 10-4.2l.7-.7c5.6-5.4 5.6-14.4.1-19.9zm-72.1-50.7c-12.6 12.4-29.2 19.2-46.9 19.2-17.9 0-34.8-7-47.4-19.7-26.2-26.3-26.2-69 0-95.3C41.6 15.9 58.4 8.9 76.4 8.9c17.9 0 34.8 7 47.4 19.7 26 26.1 26.1 68.4.5 94.8l-1 1zm65.8 64.5l-.7.7c-1 1-2.3 1.6-3.8 1.6-1.4 0-2.7-.6-3.7-1.6l-55.1-55.3 3.7-3.7.5-.5c.2-.2.3-.3.4-.5l3.6-3.6 55.1 55.2c2.1 2.2 2.1 5.6 0 7.7z"></path>
                        </g>
                    </svg>
                </h2>
                <form class="form-group">
                    <input class="form-control" id="saerchPorduct" />
                </form>
                <div class="result-search" id="tableResult">
                    <div class="table-responsive">
                        <table class="table table_cart">
                            <thead>
                                <tr class="header_row">
                                    <th>VARER</th>
                                    <th>PRIS</th>
                                    <th>BESKRIVELSEN</th>
                                </tr>
                            </thead>
                            <tbody id="productList">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            
            $("#tableResult").hide();

            $("#saerchPorduct").keyup(function() {
                var value = $(this).val();
                $.ajax({
                    url : "/searchProduct",
                    data : {
                        _token : $("meta[name='csrf-token']").attr('content'),
                        query : value
                    },
                    method: "post",
                    success : function(data) {
                        printResult(data);
                    }
                })
            });
        });

        function printResult(data) {

            var content = "";
            for(var i in data) {
                content += "<tr>";

                content += "<td>";
                content += data[i].name;
                content += "</td>";

                content += "<td>";
                content += data[i].price;
                content += "</td>";

                content += "<td>";
                content += data[i].short_description;
                content += "</td>";
                
                content += "</tr>";
            }
            
            if ( ! content) {
                content += "<tr><td colspan='3' class='text-center'>Ikke fundet poster</td></tr>";
            }

            $("#tableResult").show();
            $("#productList").html(content);
        }
    </script>
@endpush