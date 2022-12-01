const deleteBtn = document.getElementById("deleteBtn")
const yesBtn = document.getElementById("yes")
const noBtn = document.getElementById("no")
const modal = document.getElementById("modal")
const verifyBtn = document.getElementById("verifyBtn")
const id = deleteBtn.getAttribute("data-id")
const verified = verifyBtn.getAttribute("data-status")

const xhttp = new XMLHttpRequest()

xhttp.onload = function () {
  if (this.responseText === "deleted") {
    location.href = "./allblogs.php"
  } else if (this.responseText === "success") {
    location.reload()
  }
}

yesBtn.onclick = () => {
  deleteBtn.disabled = true
  xhttp.open("GET", `../php/delete.php?id=${id}`)
  xhttp.send()
}
deleteBtn.onclick = () => {
  modal.classList.remove("d-none")
}
noBtn.onclick = () => {
  modal.classList.add("d-none")
}
verifyBtn.onclick = () => {
  verifyBtn.disabled = true
  verified == "0"
    ? xhttp.open("GET", `../php/verify.php?id=${id}`)
    : xhttp.open("GET", `../php/unverify.php?id=${id}`)
  xhttp.send()
}
