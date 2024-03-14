$(() => {
    validate();

    $("#datepicker, #datepicker-2, #desc_input, #task_input").change(validate);

    let nextID = 4;

    $(".sortable").sortable({
        connectWith: ".sortable",
        handle: ".default",
        cancel: "",
        dropOnEmpty: true,
        placeholder: "card-placeholder ui-corner-all",
    });

    $(".default").on("click", function () {
        let display = $(this);
        display.closest(".default").find(".content").toggle();
    });

    // new task on submit
    $(document).on("click", ".btn-sub", () => {
        let startDate = $("#datepicker").datepicker("getDate");
        let endDate = $("#datepicker-2").datepicker("getDate");
        let desc = $("#desc_input").val();
        let text = $("#task_input").val();

        console.log(startDate);
        console.log(endDate);
        console.log(desc);

        $("#datepicker").val("");
        $("#datepicker-2").val("");
        $("#desc_input").val("");
        $("#task_input").val("");
        $("#box").append(task(text, desc));

        nextID++;

        $(".btn-sub").prop("disabled", true);
    });

    $(document).on("click", ".btn-complete", () => {
        window.location.href = "?page=projects"
    });

    // deletes a task
    $(document).on("click", ".button-x", function () {
        $(this).parent().collapse("dispose").fadeOut(150, $(this).parent().remove);
    });

    // defines a task
    function task(text, desc) {
        return `
        <li>
            <button class="default" type="button" data-toggle="collapse" data-target="#collapseExample${nextID}" aria-expanded="false" aria-controls="collapseExample${nextID}">
                ${text}<span class="button-x">&times;</span>
            </button>
            
            <div class="collapse" id="collapseExample${nextID}">
                <p class="content">Description: ${desc}</p>
            </div>
        </li>
        `;
    }

    // enable submit button when all data fields entered
    function validate() {
        if ($("#datepicker").val().length > 0 && $("#datepicker-2").val().length > 0 && $("#desc_input").val().length > 0 && $("#task_input").val().length > 0) {
            $(".btn-sub").prop("disabled", false);
        } else {
            $(".btn-sub").prop("disabled", true);
        }
    }

    // initialises variables
    $("#datepicker").datepicker({ showButtonPanel: true });
    $("#datepicker-2").datepicker({ showButtonPanel: true });

    $("#accordion").accordion({
        collapsible: true,
        heightStyle: "content",
        icons: { "header": "ui-icon-caret-1-s", "activeHeader": "ui-icon-caret-1-n" }
    });

    $("#progressbar").progressbar({ value: 37 });
    $("#progressbar-2").progressbar({ value: 74 });
    $("#progressbar-3").progressbar({ value: 52 });
});
