const buttonEdit = document.getElementById("button-edit");
const buttonDelete = document.getElementById("button-delete");

document.querySelectorAll(".list-users").forEach((item) => {
  item.addEventListener("click", (element) => {
    const curentElement = element.target.parentNode;
    const selected = document.querySelector(".item-selected");

    if (selected && selected != curentElement) {
      RemoveSelectElement(selected);
    }

    controlCheckbox(curentElement);
    activateButtonsActions();
    curentElement.classList.toggle("item-selected");
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
  const listItems = document.querySelectorAll("tbody > tr");

  listItems.forEach((element) => {
    if (element.classList == "item-selected") {
      buttonDelete.style.display = "block";
    } else {
      buttonDelete.style.display = "none";
    }
  });
}
