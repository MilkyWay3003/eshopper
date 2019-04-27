<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route('menProducts')}}">Men</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route('womenProducts')}}">Women</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route('kidsProducts')}}">Kids</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route('womenProducts')}}">Sports</a></h4>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{route('womenProducts')}}">Accessories</a></h4>
                </div>
            </div>

        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <!--<h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                </ul>
            </div>-->
        </div><!--/brands_products-->
        <link href = "{{asset('css')}}/jquery-ui.css" rel="stylesheet">
        <script src="{{asset('js')}}/jquery.js"></script>
        <script src="{{asset('js')}}/jquery-ui.js"></script>

        <div class="price-range"><!--price-range-->

            <h2>Price Range</h2>
            Price :<span id = "spa"></span>
            <div class="well text-center">
               <div id = "range"></div>
            </div>
        </div><!--/price-range-->
      <a href = "" class = "btn btn-primary">Filter</a>



<script>

    var spa = $("#spa");


 $("#range").slider({
    range:true,
     min:0,
     max:1000,
     values:[50,500],
     slide:function (event,ui) {
         spa.html(ui.values[0] + "$-" + ui.values[1]+"$");
     }

 })
    spa.html($("#range").slider("values",0)+ "$-" + $("#range").slider("values",1)+"$");
</script>

        <div class="shipping text-center"><!--shipping-->
            <img src="{{asset('images')}}/home/shipping.jpg" alt="" />
        </div><!--/shipping-->

    </div>
</div>
