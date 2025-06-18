console.log("Ucitan JavaScript");

$('#btn-obrisi').click(function(event){
    event.preventDefault();
    console.log("Usao u brisanje")

    const field = $("input[name=id_predmeta]:checked");

    $.ajax(
        {
            url: "obrada.php",
            type: "post",
            data: {
                "id_predmeta": field.val()
            }
        }
    ).done(function(response){
        console.log(response)
        if(response === "uspesno obrisano"){
            field.closest("tr").remove();
        } else {
            console.log("neuspesno");
        }
    })

})