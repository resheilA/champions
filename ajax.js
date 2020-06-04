function show_sports(urls, fieldid){
 $.ajax({
                type: "POST",
                url: urls,
                data: $(fieldid).val(),
                success: function(msg) {
                    console.log(msg);
                }
            });
}
