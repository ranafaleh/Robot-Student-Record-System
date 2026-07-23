document
  .getElementById("myForm")
  .addEventListener("submit", function (e) {

    e.preventDefault();

    const formData = new FormData();

    formData.append(
      "name",
      document.getElementById("name").value
    );

    formData.append(
      "age",
      document.getElementById("age").value
    );

    fetch("./insertcode.php", {
      method: "POST",
      body: formData
    })
      .then(response => {
        if (!response.ok) {
          throw new Error(
            "insertcode.php failed. Status: " + response.status
          );
        }

        return response.text();
      })
      .then(data => {
        document.getElementById("tableBody").innerHTML = data;
        document.getElementById("myForm").reset();
      })
      .catch(error => {
        console.error(error);
        alert(error.message);
      });

  });


function toggleStatus(id) {

  const formData = new FormData();

  formData.append("id", id);

  fetch("./togglecode.php", {
    method: "POST",
    body: formData
  })
    .then(response => {
      if (!response.ok) {
        throw new Error(
          "togglecode.php failed. Status: " + response.status
        );
      }

      return response.text();
    })
    .then(data => {
      document.getElementById("tableBody").innerHTML = data;
    })
    .catch(error => {
      console.error(error);
      alert(error.message);
    });

}