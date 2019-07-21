@extends(`layout`)

@section(`content`)
    <div class="container">
        <form method="get" action="" class="formArea">
            @csrf
            <input type="text" name="search" class="inputText js-get-val-search" placeholder="検索">
            <input type="hidden"><i class="fas fa-search js-click"></i>
        </form>
        <h1>商品一覧</h1>
        <span class="js-MsArea"></span>
    <div class="products js-get-product">
         <div class="js-remove-product">
             @foreach($products as $product)
             <div class="index-product">
                 <img class="index-img" src="data:image/jpeg;base64, {{ $product->pic }}">
                 <a id="name" class="product-name" href={{ route(`products.show`, [`product` => $product->id]) }}>{{ $product->name }}<br></a>
             </div>
             @endforeach
         </div>
      </div>
    </div>
@endsection
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script>
    $(function() {
        $(`.formArea`).on(`js-click`, function (e) {
            e.preventDefault();

            $.ajax({
                type: `get`,
            url: `/api/v1/products`,
            dataType: `json`,
            data: {
                search: $(`.js-get-val-search`).val()
            },
        }).done(function (data) {
                //通信成功時の処理
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    $(".js-MsArea").html(`検索に一致するものがありました`);
                    console.log(data);
                    $(`.js-remove-product`).replaceWith($("<a>").attr({
                           "id": name,
                           "href": `#`
                }).text(data[i].name));
                    $(`.js-get-product`).append($("<img>");
                }
            }).fail(function (data) {
                //通信失敗時の処理
                $(".js-MsArea").html(`検索に一致するものがありませんでした`);
            });
        });
    });
</script>
