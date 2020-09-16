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