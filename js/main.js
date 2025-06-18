console.log("Ucitan JavaScript");

console.log("Povezan JavaScript fajl")

$('#dodajForm').submit(function(event){
    event.preventDefault();
    console.log("dodavanje je pokrenuto")

    //pokupiti podatke sa forme
    const $form = $(this);
    console.log($form);

    const serialForm = $form.serializeArray();
    console.log(serialForm);

    const newRow = serialForm.reduce(
        (json, {name, value}) => ((json[name] = value), json)
    )

    $.ajax(
        {
            url: "obrada.php",
            type: "post",
            data: serialForm,
        }
    ).done(
        function(response){
            console.log(response);
            if(!isNaN(response)){
                console.log("Prijava dodata.");
                appendRow({
                    id:response,
                    ...newRow
                })
            } else {
                console.log("Prijava NIJE dodata");
            }
        }
    ).fail(
        function(errorThrown){
            console.error('Greska prilikom dodavanja prijave')
        }
        
    )
});

function appendRow(data){
    $('#myTable tbody').append(
        `
        <tr>
            <td>${data.predmet}</td>
            <td>${data.katedra}</td>
            <td>${data.sala}</td>
            <td>${data.datum}</td>
            <td>
                <label class="custom-radio-btn">
                    <input type="radio" name="id_predmeta" value="${data.id}">
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
        `
    )
}

$('#btn-obrisi').click(function(event){
    event.preventDefault();
    console.log("Usao u brisanje")

    const field = $("input[name=id_predmeta]:checked");

    $.ajax(
        {
            url: "obrada.php",
            type: "post",
            data: {
                "id_necega": field.val()
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