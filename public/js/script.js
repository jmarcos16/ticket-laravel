$(document).ready(function () {
  let table = $("#datatable");

  if (table) {
    table.DataTable({
      language: {
        url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json",
      },
      initComplete: function () {
        filterCountElements = document.querySelector("[name='datatable_length']");
        filterCountElements.parentNode.className = "d-flex w-50 float-start align-items-center";
        filterCountElements.className = "form-control shadow-none w-25 mx-1";

        inputSearchTable = document.querySelector("[type='search'");
        inputSearchTable.parentNode.className = "d-flex w-50 float-end justify-content-end align-items-center";
        inputSearchTable.className = "form-control shadow-none w-75 mx-1";

        inputSearchTable.placeholder = "Pesquisar";
      },
    });
  }
});
