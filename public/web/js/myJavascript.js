// $(document).on("click",".del-cart", function(e){
//     var id = $(this).attr('id');
//     $.get('/delCart',{id: id},function(data){
//         $("#total-price").load(' .total-price');
//         $("#cart").load(' #data-cart');
//         $("#carts").load(' #bag-carts');
//         $('body').load('index.php?page=shop-cart');
//     });
// });
//
//
// $(document).on('click', '.inc', function(){
//     var qty  = new Number($(this).attr('name'));
//     qty +=1;
//     var id = $(this).attr('id');
//     $.get('/updateCart',{id: id, qty : qty },function(data){
//         $("#cart").load(' #data-cart');
//         $("#total-price").load(' .total-price');
//     });
//
// });
//
// $(document).on('click', '.dec', function(){
//     var qty  = new Number($(this).attr('name'));
//     qty -=1;
//     var id = $(this).attr('id');
//     $.get('/updateCart',{id: id, qty : qty },function(data){
//         $("#cart").load(' #data-cart');
//         $("#total-price").load(' .total-price');
//         $("#test").load('.test1');
//     });
//
// });
//


// $(document).on("click",".order", function(e){
//     var id = $(this).attr('id');
//     $.get('/addCart',{id: id},function(data){
//         $("#carts").load(' #bag-carts');
//         $('.notiProduct').slideDown('fast');
//         $('.notiProduct').delay(2000).slideUp('fast');
//     });
// });
//
//
// $(document).on("click",".cart-btn", function(e){
//     var id = $(this).attr('id');
//     $.get('/addCart',{id: id},function(data){
//         $("#carts").load(' #bag-carts');
//         $('.notiProduct').slideDown('fast');
//         $('.notiProduct').delay(2000).slideUp('fast');
//     });
// });


//yêu thích sản phẩm
// $(document).on('click','.heart',function(e){
//     var id= $(this).attr('id');
//     $.ajax({
//         url         : '/likeProduct',
//         type        : 'get',
//         dataType    : 'json',
//         data        : { id : id },
//         success : function(data){
//             $("#heart").load(' #like');
//             $('.favorite_list').slideDown('fast');
//             $('.favorite_list').delay(2000).slideUp('fast');
//         },
//         error : function(data){
//         }
//     });
// });

//xóa sản phẩm yêu thích
// $(document).on('click','.delete',function(e){
//     var id= $(this).attr('id');
//     $.ajax({
//         url         : '/delLikeProduct',
//         type        : 'get',
//         dataType    : 'json',
//         data        : { id : id },
//         success : function(data){
//             $("#heart").load(' #like');
//             $('body').load('/favoriteList')
//         },
//         error : function(data){
//         }
//     });
// });



//chi tiết sản phẩm
// $(document).on('click','.detail',function(e){
//     var id = $(this).attr('id');
//     // var action = 'detail';
//     $.ajax({
//         url         : '/productDetail',
//         type        : 'get',
//         dataType    : 'json',
//         data        : { id : id },
//         success : function(data){
//             var name= data.name;
//             $('#imgDetail').html('<img src="/getimage/'+data.mainImage+'">');
//             $('.modal-body .proDes').html(data.description);
//             $('.modal-body h3').html(name);
//             $('.modal-body h4').html(Number(data.price).toLocaleString('en')+"đ");
//             $('.modal-body a').attr('id',data.id);
//         },
//         error : function(data){
//         }
//     });
// });

// $(document).on('keyup','#search_input',function(e){
//     $("#form_search").css({'position':'absolute','top':'120px'});
//     $("#show_search").css('margin-top','-530px');
//     let searchText = $(this).val();
//     if (searchText != "") {
//         // $.ajax({
//         //     url: "{{ route('search') }}",
//         //     headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
//         //     method: "get",
//         //     data: {
//         //         name: searchText,
//         //     },
//         //     success: function (response) {
//         //         console.log(response);
//         //        let result =  response.map(value =>{
//         //             // return  '<a href="/product/'+value.id+'" class="list-group-item list-group-item-action border-1"><img style="width: 10%;" src="/getimage/'+value.mainImage+'" alt=""> &ensp;' +value.name+'</a>'
//         //         })
//         //         $("#show-list").html(result);
//         //     },
//         // });
//
// });
//
//
// // $(document).on('click','.page',function(e){
// //     var id = $(this).attr('id');
// //     var from = (id-1)*20;
// //     $.ajax({
// //         url         : '/page',
// //         type        : 'get',
// //         dataType    : 'json',
// //         data        : { from:from},
// //         success : function(data){
// //             let result = data.map(value => {
// //                 return '<div  id="product"   class="col-lg-3 col-md-4 col-sm-6 mix  pro'+value.category.id+'cat">\n' +
// //                     '    <div class="product__item">\n' +
// //                     '        <div class="product__item__pic set-bg" data-id="'+value.id+'" data-setbg="/getimage/'+value.mainImage+'">\n' +
// //                     '            <ul class="product__hover">\n' +
// //                     '                <li><a href="#detail" data-toggle="modal" data-target="#detail" class="detail" id="'+value.id+'"><span class="fa fa-eye"></span></a></li>\n' +
// //                     '                <li><a  class="heart" id="'+value.id+'"><span class="icon_heart_alt"></span></a></li>\n' +
// //                     '                <li><a href="#order" class="order" id="'+value.id+'"><span class="icon_bag_alt" type="buy"></span></a></li>\n' +
// //                     '            </ul>\n' +
// //                     '        </div>\n' +
// //                     '        <div class="product__item__text">\n' +
// //                     '            <h6>\n' +
// //                     '                <a href="/product/'+value.id+'">'+value.name+'</a>\n' +
// //                     '            </h6>\n' +
// //                     '            <div class="product__price">'+value.price+'</div>\n' +
// //                     '        </div>\n' +
// //                     '    </div>\n' +
// //                     '</div>\n'
// //             })
// //             console.log(result);
// //             $("#page").html(result);
// //         },
// //         error : function(data){
// //         }
// //     });
// // });
// $(document).on('click','.cart-btn',function(e){
//     $('#detail').modal('hide');
// });

    //     $(document).on('keyup','#search_input',function(e){
    //     $("#form_search").css({'position':'absolute','top':'120px'});
    //     $("#show_search").css('margin-top','-530px');
    //     let searchText = $(this).val();
    //     if (searchText != "") {
    //     $.ajax({
    //     url: "{{ route('search') }}",
    //     method: "get",
    //     data: {
    //     name: searchText,
    // },
    //     success: function (response) {
    //     console.log(response);
    //     let result =  response.map(value =>{
    //     return  '<a href="" class="list-group-item list-group-item-action border-1"><img style="width: 10%;" src="http://127.0.0.1:8000/'+value.main_image+'" alt=""> &ensp;' +value.name+'</a>'
    // })
    //     $("#show-list").html(result);
    // },
    // });
    // } else {
    //     $("#show-list").html("");
    // }
    // });