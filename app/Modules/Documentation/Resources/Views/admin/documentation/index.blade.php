@extends('layouts.admin')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Documentation</h1>
        </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="toc"></div>
                    </div>
                    <div class="col-md-9">
                        <div id="docs">
                            @include('documentation::admin.documentation.documentation')
                        </div>
                    </div>
                </div>



        </div>
        <div class="box-footer">
        </div>
    </div>
@endsection

@section('script')

    <script src="/plugins/toc/toc.js"></script>

    <script>
        $(document).ready(function () {
            var result = 0;
            var i = 0;
            var j = 0;
            $('#docs h1').each(function(index, element){
                i++;
                $(element).text(i + ' ' + $(element).text());

                j = 1;
                $(element).nextUntil('h1').each(function(subindex, subelement){
                    if (!$(this).is('h2')) return; // so subelements other than h2 can be left alone
                    j++;
                    $(subelement).text(i + '.' + j + ' ' + $(subelement).text());
                });
            });

            $('.toc').toc({
                container: '#docs'
            });
        });

    </script>


@endsection

@section('style')
    <style>
        .toc {
            background: #fefefe;
            width: 200px;
            position: fixed;
            border: 1px solid #ddd;
            color: #333;
        }

        .toc a { color: #333; }

        .toc .tocH2 { margin-left: 10px }

        .toc .tocH3 { margin-left: 20px }
        .toc ul li{
            list-style: none;
        }
        .toc-active {
            color: #000;
            font-weight: bold;
        }

            </style>
    @endsection