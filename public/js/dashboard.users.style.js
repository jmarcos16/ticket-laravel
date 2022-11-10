const buttonEdit = document.getElementById("button-edit");
const buttonDelete = document.getElementById("button-delete");

document.querySelectorAll(".list-users > tr").forEach((item) => {
  item.addEventListener("click", (element) => {
    const curentElement = element.target.parentNode;
    const selected = document.querySelector(".item-selected");

    if (selected && selected != curentElement) {
      RemoveSelectElement(selected);
    }

    controlCheckbox(curentElement);
    curentElement.classList.toggle("item-selected");
    activateButtonsActions();
  });
});

function RemoveSelectElement(element) {
  element.classList.remove("item-selected");
}

function controlCheckbox(currentElement) {
  const checkbox = document.querySelectorAll("tbody > tr");

  checkbox.forEach((element) => {
    const checkbox = element.querySelector("input[type='checkbox']");

    if (element && element !== currentElement) {
      checkbox.checked = false;
    } else {
      if (checkbox.checked) {
        checkbox.checked = false;
      } else {
        checkbox.checked = true;
      }
    }
  });
}

function activateButtonsActions() {
  const listItems = document.querySelector("tr.item-selected");

  if (listItems) {
    buttonDelete.style.display = "block";
    buttonEdit.style.display = "block";
  } else {
    buttonEdit.style.display = "none";
    buttonDelete.style.display = "none";
  }
}

buttonEdit.addEventListener("click", function (element) {
  const idUser = document.querySelector("tr.item-selected");
  const provider = idUser.getElementsByClassName("value-provider");
  element.preventDefault();

  if (idUser) {
    window.location.href = `/user/edit/${idUser.id}/${provider[0].textContent}`;
  }
});

buttonDelete.addEventListener("click", function (element) {
  if (window.confirm("Excluir item")) {
    const idUser = document.querySelector("tr.item-selected");
    const provider = idUser.getElementsByClassName("value-provider");

    if (idUser) {
      window.location.href = `/user/delete/${idUser.id}/${provider[0].textContent}`;
    }
  }
  element.preventDefault();
});
