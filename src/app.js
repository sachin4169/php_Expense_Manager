$(document).ready(function(){
    // alert("hello")
    $("#update").hide();
    $.ajax({
        url:"./function.php",
        method:"GET",
        data: {action:"display"},
        type:"JSON",
        success: function(respose){
            displaytable(JSON.parse(respose));
        },
        error: function(error){
            console.log(error);
        }

    })
    //  ==================== Adding  =============
    $("#add").click(function(){
        var category = $("#category").val();
        var details = $("#dis").val();
        var date = $("#date").val();
        var amount = $("#amount").val();
        console.log( category +" ,"+ details+", "+date+" ,"+amount)
        $.ajax({
            method:"POST",
            url:"./function.php",
            data: {
                category : category, 
                dis: details,
                date:date,
                amount:amount,
                action:"add",
            } ,
            type:"JSON",
            success: function(respose){
                // console.log(respose);
                displaytable(JSON.parse(respose));
            },
            error: function(error){
                console.log(error);
            }
        })

    })
    $(document).on('click', '.edit', function(){
        var id = this.id;
        // console.log(id);
        var date = $("#row_"+id).children().first().html();
        console.log(date);
        var dis = $("#row_"+id).children().eq(2).html();
        console.log(dis);
        var category = $("#row_"+id).children().eq(1).html();
        console.log(category);
        var amount = $("#row_"+id).children().eq(3).html();
        console.log(amount);

        $("#category").val(category);
        $("#dis").val(dis);
        $("#date").val(date);
        $("#amount").val(amount);
        $("#id").val(id)
        // var x=$(`#${}`).parent();
        // console.log(x);
        $("#add").hide();
        $("#update").show();
    })
    
    //  ==================== updating =============
    $("#update").click(function(){
        var category = $("#category").val();
        var details = $("#dis").val();
        var date = $("#date").val();
        var amount = $("#amount").val();
        var id = $("#id").val();
        console.log( category +" ,"+ details+", "+date+" ,"+amount)
        $.ajax({
            method:"POST",
            url:"./function.php",
            data: {
                id:id,
                category : category, 
                dis: details,
                date:date,
                amount:amount,
                action:"update",
            } ,
            type:"JSON",
            success: function(respose){
                displaytable(JSON.parse(respose));
            },
            error: function(error){
                console.log(error);
            }
        })
    })
    //  ==================== removing =============
    $(document).on('click', '.del', function(){
        var x = this.id;
        var id = x.split("_")[1]; 
        console.log(id);
        $.ajax({
            method:"GET",
            url:"./function.php",
            data: {
                id:id,
                action:"delete",
            } ,
            type:"JSON",
            success: function(respose){
                displaytable(JSON.parse(respose));
            },
            error: function(error){
                console.log(error);
            }
        })
    })
    //  ================= search ===============
    $(document).ready(function() {
        $("#myInput").on("change", function() {
            var value = $(this).val();
            console.log(value);
            $.ajax({
                method:"GET",
                url:"./function.php",
                data: {
                    val:value,
                    action:"search",
                } ,
                type:"JSON",
                success: function(respose){
                    displaytable(JSON.parse(respose));
                },
                error: function(error){
                    console.log(error);
                }
            })

            // $("#myTable tr").filter(function() {
                // var id = $(this).toggle($(this).children().eq(1).text().toLowerCase().indexOf(value) > -1)
                // var id = $(this).toggle($(this).text().toLowerCase().indexOf(value));
                // console.log($(this).toggle($(this).children().eq(1).text().toLowerCase().indexOf(value)));
            // });
        });
    });
})


function displaytable(data){
    // $("#mytable").empty();
    var row ="";
    var total =0;
    data.forEach(e => {
        row += ` <tr id="row_${e.e_id}">
        <th scope="row">${e.date}</th>
        <td>${e.category}</td>
        <td>${e.dis}</td>
        <td>${e.amount}</td>
        <td>
            <button class="del" id="del_${e.e_id}">delete</button>
            <button class="edit" id="${e.e_id}">edit</button>
        </td>
    </tr>`
    total += Number(e.amount); 
    });
    $("#myTable").html(row);
    $('#total').html(total);

}