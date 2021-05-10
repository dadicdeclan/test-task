<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">
            Test Feladat
        </div>
        <div class="container">
            <form method="get" action="{{ route('product-search') }}" id="user-registration">
                <div class="row">
                <div class="col-6 form-group">
                    <label for="search">Keresendő szöveg <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control form-control-sm" placeholder="" required>
                    </div>
              </div>
                <div class="col-6 form-group">
                    <label for="view_mode">Megjelenítés</label>
                    <div class="input-group">
                        <select class="form-control form-control-sm" name="view_mode" id="view_mode">
                            <option value="">Kérlek válassz</option>
                                <option value="price_desc">Ár szerint csökkenő</option>
                                <option value="price_asc">Ár szerint növekvő</option>
                                <option value="name_desc">ABC növekvő</option>
                                <option value="name_asc">ABC csökkenő</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 form-group">
                    <button type="submit" class="btn btn-danger">Keresés</button>
                </div>
                </div>
            </form>
        </div>

        <div class="container mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">productName</th>
                    <th scope="col">productPrice</th>
                    <th scope="col">productCategoryId</th>
                    <th scope="col">categoryName</th>
                </tr>
                </thead>
                <tbody>
                @foreach($get_all_products as $productItemData)
                    <tr>
                        <th scope="row">{{ $productItemData->id }}</th>
                        <td>{{ $productItemData->productName }}</td>
                        <td>{{ $productItemData->productPrice }}</td>
                        <td>{{ $productItemData->productCategoryId }}</td>
                        <td>{{ $productItemData->productAssignedCategory->categoryName }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $get_all_products->links() !!}
            </div>
        </div>
    </div>
</div>
</body>
</html>
