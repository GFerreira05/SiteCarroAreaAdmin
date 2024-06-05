

// function handleKeyPress(event) {
//     if (event.key === "Enter") {
//         event.preventDefault(); // Impede o comportamento padrão do Enter (submit do formulário)
//         submitLance();
//     }
// }

// function submitLance() {
//     var lanceInput = document.getElementById("lanceInput");
//     var errorText = document.getElementById("errorText");
//     var lanceValue = parseFloat(lanceInput.value);
//     if (lanceValue >= 6000) {
//         // Aqui você pode enviar o lance para onde desejar
//         alert("Lance enviado com sucesso: R$" + lanceValue.toFixed(2));
//         // Você também pode resetar o valor do input, se desejar
//         // lanceInput.value = "";
//         errorText.style.display = "none";
//     } else {

//         errorText.style.display = "block";
//     }
// }