const btnSend = document.getElementById("btn");
const chat = document.getElementById("chat");

const getMessage = (msg) => {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {

      const response = xhr.responseText;
      const chatBody = document.querySelector(".scroller");

      const divUser = document.createElement("div");
      divUser.className = "me visible";
      divUser.textContent = msg;

      const divCpu = document.createElement("div");
      divCpu.className = "bot visible";
      divCpu.innerHTML = response;
      
      chatBody.append(divUser);
      
      setTimeout(() => {
        chatBody.append(divCpu);
        chatBody.scrollTop = chatBody.scrollHeight;
      }, 10);
      
    }
  };

  xhr.open("GET", "engine/chat.php?msg=" + msg, true);
  xhr.send();

};

btnSend.addEventListener("click", (e) => {
  e.preventDefault();
  if (chat.value === "") {
  } else {
    getMessage(chat.value);
    chat.value = "";
  }
});