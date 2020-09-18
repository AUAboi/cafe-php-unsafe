var attribute = `
                <div class="flex justify-around">
                    <div>
                        <label for="attribute">Dish Attribute</label>
                        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" placeholder="Write Dish Attribute" name="attribute[]">
                    </div>
                    <div>
                        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" placeholder="Write Price" name="price[]">
                    </div>
                </div>
            `;

function addMore() {
    $('#attribute-box').append(attribute);
    $('#remove-btn').show();

}

function remove() {
    $("#attribute-box").children().last().remove();
    if ($("#attribute-box").children().length == 1) {
        $('#remove-btn').hide();
    }
}


var attId = 0;

function callModal(id) {
    overlay();
    $(".modalBox").toggleClass("hidden");
    const msg = document.querySelector(".msg");
    msg.innerHTML =
        `
            <p class="msg">
                Do you really want to delete this attribute? 
            </p>
        `
    attId = id;
    
}

function delAtt() {

    $("#attribute-box").children().last().remove();
    if ($("#attribute-box").children().length == 1) {
        $('#remove-btn').hide();
    }
    
    attCallback(attId);
    clearModal();
}

function attCallback(id) {
    
    $.get("/cafe/dist/admin/ajax/deleteAttribute.php?att-id=" + id, (res) => {
        console.log(res);
    })
}