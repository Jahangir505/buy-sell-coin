function addEvent(element, myEvent, fnc) {
  return element.attachEvent
    ? element.attachEvent("on" + myEvent, fnc)
    : element.addEventListener(myEvent, fnc, false);
}

function custom_method_manager() {
  let btn = document.querySelector(".custom_pay_validator");
  let submit_btn = document.querySelector(".submit_form");

  if (btn) {
    let modal = document.querySelector(".custom_crypto_adresse_modal");

    let name = modal.querySelector("#nom"),
      adress = modal.querySelector("#adresse"),
      detail = modal.querySelector("#detail");

    let container = document.querySelector("#custom_wallet_adresse");

    let sended = document.querySelector("#buy_pay_address");

    addEvent(btn, "click", () => {
      container.textContent = adress.value;

      sended.value =
        name.options[name.selectedIndex].value +
        "-" +
        adress.value +
        "-" +
        detail.value;
    });

    addEvent(submit_btn, "click", () => {
      if (adress.value == "" || detail.value == "") {
        container.style.borderColor = "red";
      }
    });
  }
}

function confirm_form() {
  if (document.querySelector(".confirm_form")) {
    let ok_confirm = false,
      ok_file = false;

    const form = document.querySelector(".confirm_form");

    let pay_method = document.getElementById("pay-method"),
      coin = document.querySelector(".select_coin"),
      custom_sell_method = document.querySelector("#buy_custom_paiemen"),
      custom_buy_method = document.querySelector("#buy_custom_paiemen"),
      pay_amount = document.querySelector("#pay-amount"),
      procedure = document.querySelector("#pay-description");

    let selected_pay_method = document.querySelector("#pay_method");

    let selected_pay_amount = document.querySelector(".amount");

    let total_amount = document.querySelector(".crypto_amount");

    let receipt = document.querySelector("#receipt");

    let confirmW = document.querySelector("#confirm-wallet");

    let formtype = document.querySelector(".crypto-form").getAttribute("id");

    //

    formtype == "sell_crypto" &&
      addEvent(custom_sell_method, "change", () => {
        document.querySelector("#sell_pay_address").textContent =
          custom_sell_method.options[custom_sell_method.selectedIndex].value;
      });

    //

    //

    formtype == "buy_crypto" &&
      addEvent(custom_buy_method, "change", () => {
        document.querySelector("#buy_pay_address").value =
          custom_buy_method.options[custom_buy_method.selectedIndex].value;
      });

    function wallet_confirm() {
      if (confirmW.value != document.querySelector(".wallet_address").value) {
        document.querySelector("#wallet-error").textContent =
          "Les adresses de paiement sont differentes";

        ok_confirm = false;
      } else {
        document.querySelector("#wallet-error").textContent = "";

        ok_confirm = true;
      }
    }

    //

    addEvent(selected_pay_method, "change", () => {
      pay_method.textContent =
        selected_pay_method.options[
          selected_pay_method.selectedIndex
        ].textContent;

      document.querySelectorAll(".data-deposit").forEach((element) => {
        if (
          element.getAttribute("data-deposit_name") == pay_method.textContent
        ) {
          procedure.innerHTML = element.textContent;
        }
      });

      formtype == "sell_crypto" &&
        custom_paiement_manager(
          selected_pay_method.options[selected_pay_method.selectedIndex]
            .textContent
        );
    });

    addEvent(selected_pay_amount, "input", () => {
      pay_amount.textContent = total_amount.value;
    });

    //

    addEvent(coin, "change", () => {
      pay_amount.textContent = total_amount.value;

      document.querySelector(".modal-body img").src =
        "/assets/qr_code/" +
        coin.options[coin.selectedIndex].getAttribute("data-qr");
    });

    //

    addEvent(receipt, "change", () => {
      const format = ["jpg", "jpeg", "png", "webp", "gif"];

      const selected = receipt.files[0].type.split("/")[1];

      if (!format.includes(selected)) {
        document.querySelector("#receipt-error").textContent =
          "Le fichier que vous avez selectionné n'est pas pris en charge, veillez choisis une image au format jpg, gif, png, webp, ou jpeg.";

        ok_file = false;
      } else {
        document.querySelector("#receipt-error").textContent = "";

        ok_file = true;
      }
    });

    //

    confirmW &&
      addEvent(confirmW, "change", () => {
        wallet_confirm();
      });

    //

    addEvent(form, "submit", (event) => {
      wallet_confirm();

      ok_confirm && ok_file
        ? () => {
            document.createElement("form").submit.call(form);
          }
        : event.preventDefault();
    });
  }
}

function cryptoForm() {
  if (document.querySelector(".crypto-form")) {
    document.querySelectorAll(".crypto-form").forEach((form) => {
      let coin = form.querySelector(".select_coin");

      let amount_usd = form.querySelector(".amount");

      let taux = form.querySelector(".exchange_rate");

      let crypto_amount = form.querySelector(".crypto_amount");

      let adress = form.querySelector(".wallet_address");

      //

      addEvent(coin, "change", () => {
        let val = coin.options[coin.selectedIndex].getAttribute("data-price");
        taux.value = val;

        calculate();

        if (form.getAttribute("id") == "sell_crypto") {
          adress.value = coin.options[coin.selectedIndex].getAttribute(
            "data-wallet_address"
          );

          let label = adress.parentNode.querySelector("label");

          label.innerHTML =
            coin.options[coin.selectedIndex].textContent + " wallet address";
        } else {
          custom_paiement_manager(coin.options[coin.selectedIndex].textContent);
        }
      });

      //

      addEvent(amount_usd, "input", () => {
        calculate();
      });

      var calculate = function () {
        exchange_rate = taux.value;

        exchange_rate = exchange_rate ? exchange_rate : 0;

        amount = amount_usd.value;

        amount = amount && amount > 0 ? amount : 0;

        var crypto_total_amount = 0;

        if (amount > 0) {
          crypto_total_amount = parseFloat(amount * exchange_rate);
        }

        // if(amount == 1)

        // {

        // 	crypto_amount = exchange_rate;

        // }

        crypto_amount.value = crypto_total_amount;
      };
    });
  }
}

function custom_paiement_manager(val) {
  if (document.querySelector("#data_user_adresse")) {
    let select = document.querySelector("#buy_custom_paiemen");
    let news = document.querySelector("#custom_wallet_adresse");
    // let adress = modal.querySelector("#adresse");
    let data = document
      .querySelector("#data_user_adresse")
      .getAttribute("data-user-adresse");

    let customLevel = document.querySelector("#custom_method");

    let modal = document.querySelector(".custom_crypto_adresse_modal");

    let closes = modal.querySelector(".custom_pay_validator");

    let add = document.querySelector("#add_method");
    let addStyle = document.querySelector("#buy_custom_paiemen2");

    data = JSON.parse(data);

    let check = data.filter((test) => test.name == val);

    check = Object.values(check);

    if (check.length > 0) {
      news.style.display = "none";

      select.style.display = "block";

      add && (add.style.display = "block");
      addStyle && (addStyle.style.display = "inline-flex");

      select.innerHTML = "";
      //   addStyle.innerHTML = "";

      for (const key in check) {
        if (Object.hasOwnProperty.call(check, key)) {
          let option = document.createElement("option");

          option.setAttribute(
            "value",
            check[key].name + ":" + check[key].number
          );

          option.textContent = check[key].number;

          select.appendChild(option);

          document.querySelectorAll(".required").forEach((element) => {
            element.removeAttribute("required");
          });
        }
      }
      document.querySelector("#buy_pay_address").setAttribute("name", "");

      customLevel.setAttribute("name", "");

      news.style.borderColor = "red";

      make_selection();

      addEvent(closes, "click", () => {
        let option = document.createElement("option");

        option.setAttribute("value", modal.querySelector("#adresse").value);

        option.textContent = modal.querySelector("#adresse").value;

        select.appendChild(option);

        document
          .querySelector("#buy_pay_address")
          .setAttribute("name", "wallet_address");

        customLevel.setAttribute("name", "custom_method");
      });
    } else {
      news.style.display = "block";

      select.style.display = "none";
      addStyle.style.display = "none";

      add.style.display = "none";
      make_selection();

      document.querySelectorAll(".required").forEach((element) => {
        element.setAttribute("required", "true");
      });

      document
        .querySelector("#buy_pay_address")
        .setAttribute("name", "wallet_address");

      customLevel.setAttribute("name", "custom_method");

      addEvent(closes, "click", () => {
        news.textContent = modal.querySelector("#adresse").value;
      });
    }

    //reconnais et initialise la monaie selectionné du formulaire principal dans la formulaire d'ajout
    function make_selection() {
      let typeContainer = document.querySelector("#nom");

      let option = document.createElement("option");

      option.setAttribute("value", val);

      option.textContent = val;

      typeContainer.innerHTML = "";

      typeContainer.appendChild(option);
    }

    console.log(check);
  }
}

function transaction() {
  let modal = document.querySelector("#more_detail");

  let btns = document.querySelectorAll(".transaction_more_btn");

  if (btns) {
    let id = modal.querySelector(".id");
    let date = modal.querySelector(".date");
    let type = modal.querySelector(".type");
    let amount = modal.querySelector(".amount");
    let amount_cfa = modal.querySelector(".amount_cfa");
    let devise = modal.querySelector(".devise");
    let taux = modal.querySelector(".taux");
    let method = modal.querySelector(".method");
    let adress_method = modal.querySelector(".adress_method");
    let adress = modal.querySelector(".adress");
    let user_image = modal.querySelector(".user_image img");
    let admin_image = modal.querySelector(".admin_image img");

    let sell_only = modal.querySelector(".sell_only"),
      buy_only = modal.querySelector(".buy_only");

    let detail_container = modal.querySelector(".detail_container");
    let user_image_container = modal.querySelector(".user_image_container");
    let admin_image_container = modal.querySelector(".admin_image_container");

    let menu_item = modal.querySelectorAll(".menu_item");

    btns.forEach((btn) => {
      addEvent(btn, "click", () => {
        let data = JSON.parse(btn.getAttribute("data-info"));

        id.textContent = data.id;
        date.textContent = data.created_at;
        type.textContent = data.table_type;
        amount.textContent = data.amount;
        amount_cfa.textContent = data.crypto_amount;
        devise.textContent = data.crypto;
        taux.textContent = data.exchange_rate;
        method.textContent = data.deposit_method;
        adress.textContent = data.wallet_address;

        user_image.src = "assets/receipt/" + data.receipt;
        admin_image.src = "assets/admin_preuve/" + data.preuve;

        /*if(data.table_type=="sell" && buy_only){
                    buy_only.forEach(buy=>{
                        buy.style.display="none";
                        sell.style.display="flex";
                    })
                }

                else if(data.table_type=="buy" && sell_only){
                    sell_only.forEach(sell=>{
                        sell.style.display="none";
                        buy.style.display="flex";
                    })
                }*/

        menu_item.forEach((item) => {
          addEvent(item, "click", () => {
            let type = item.getAttribute("id");
            // item.classList.add("active dark:bg-blue-600 bg-blue-700 text-white")

            item.style.color = "white";

            item.style.backgroundColor = "#03a84e";

            menu_item.forEach((item1) => {
              let type1 = item1.getAttribute("id");

              if (type1 != type) {
                item1.style.color = "gray";

                item1.style.backgroundColor = "#ececec";
                // item.classList.remove("active dark:bg-blue-600 bg-blue-700 text-white")
              }
            });

            type == "menu_send" &&
              (console.log("ok"),
              (detail_container.style.display = "none"),
              (admin_image_container.style.display = "none"),
              (user_image_container.style.display = "block"));
            type == "menu_get" &&
              ((detail_container.style.display = "none"),
              (user_image_container.style.display = "none"),
              (admin_image_container.style.display = "block"));
            type == "menu_detail" &&
              ((user_image_container.style.display = "none"),
              (admin_image_container.style.display = "none"),
              (detail_container.style.display = "block"));
          });
        });
      });
    });
  }
}

cryptoForm();

confirm_form();

transaction();
