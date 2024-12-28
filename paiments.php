<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Facture</title>
</head>

<body>
    <h1>تسديد فاتورة</h1>
    <form id="paymentForm">
        <label for="id_facture">رقم الفاتورة:</label>
        <input type="number" id="id_facture" required><br><br>

        <label for="montant_paye">المبلغ المدفوع:</label>
        <input type="number" id="montant_paye" step="0.01" required><br><br>

        <label for="moyen_paiement">طريقة الدفع:</label>
        <select id="moyen_paiement" required>
            <option value="carte bancaire">بطاقة بنكية</option>
            <option value="espèces">نقدًا</option>
            <option value="virement">تحويل بنكي</option>
        </select><br><br>

        <button type="submit">تأكيد الدفع</button>
    </form>

    <p id="responseMessage"></p>

    <script>
    document.getElementById("paymentForm").addEventListener("submit", function(e) {
        e.preventDefault();

        // استخراج البيانات من النموذج
        const id_facture = document.getElementById("id_facture").value;
        const montant_paye = document.getElementById("montant_paye").value;
        const moyen_paiement = document.getElementById("moyen_paiement").value;

        // إرسال البيانات إلى API باستخدام Fetch API
        fetch("http://localhost/hotel_management/pay_invoice.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    id_facture: id_facture,
                    montant_paye: montant_paye,
                    moyen_paiement: moyen_paiement
                })
            })
            .then(response => response.json())
            .then(data => {
                const message = document.getElementById("responseMessage");
                if (data.status === "success") {
                    message.style.color = "green";
                    message.innerText = data.message;
                } else {
                    message.style.color = "red";
                    message.innerText = data.message;
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
    </script>
</body>

</html>