<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Page</title>
<link rel="icon" href="images/logo.png" type="image/png">
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background: linear-gradient(to bottom right, #a1c4fd, #c2e9fb);
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
  }
  header {
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    padding: 20px;
    text-align: center;
    z-index: 10;
  }
  header img {
    max-width: 60px;
    margin-bottom: 20px;
  }
  header h1 {
    font-size: 24px;
    color: #fff;
    font-weight: 600;
    margin: 0;
  }
  .payment-container {
    width: 100%;
    max-width: 500px;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 30px 20px;
    background-color: rgba(255, 255, 255, 0.85);
    border-radius: 25px;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    text-align: center;
    position: relative;
    margin: auto;
    backdrop-filter: blur(8px);
  }
  .payment-container:hover {
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    transform: scale(1);
  }
  h2 {
    color: #333;
    font-size: 32px;
    margin-bottom: 20px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-top: 50px;
  }
  .instructions {
    font-size: 18px;
    color: #555;
    line-height: 1.7;
    margin-bottom: 30px;
    font-weight: 500;
    max-width: 90%;
    text-align: left;
  }
  .instructions ul {
    list-style-type: disc;
    margin-left: 20px;
  }
  .pay-button {
    width: 100%;
    padding: 18px;
    font-size: 20px;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .pay-button i {
    margin-right: 10px;
  }
  .pay-button:hover {
    background-color: #388e3c;
    transform: scale(1.05);
  }
  .pay-button:active {
    transform: scale(0.98);
    background-color: #2e7d32;
  }
  @media (max-width: 768px) {
    .payment-container {
      width: 90%;
      padding: 30px 15px;
    }

    .instructions {
      font-size: 16px;
    }
  }
</style>
<head>
<body>
  <div class="payment-container">
    <header>
      <img src="images/logo.png" alt="Logo">
    </header>
    <h2>Complete Your Payment</h2>
    <p class="instructions">
      Follow these simple steps to complete your payment:
    <ul>
      <li>Choose your preferred payment method (Card, UPI, or Net Banking).</li>
      <li>Double-check the payment details for accuracy.</li>
      <li>Click "Pay Now" to proceed.</li>
      <li>Once your payment is successful, you will be redirected to the next step.</li>
    </ul>
    Choose a payment option that suits you. If you encounter any issues, our support team is ready to assist you.
    </p>
    <button class="pay-button" id="rzp-button2">
      <i class="fas fa-credit-card"></i> Pay Now
    </button>
  </div>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script>
    var options = {
      "key": "rzp_test_lQ0iNCGCnEu0x3", 
      "name": "ProSkill Mind",
      "amount": "20000", 
      "currency": "INR",
      "description": "Acme Corp",
      "image": "images/logo.png",
      "prefill": {
        "email": "abc@gmail.com",
        "contact": "+919900000000"
      },
      "config": {
        "display": {
          "blocks": {
            "utib": {
              "name": "Pay using Axis Bank",
              "instruments": [
                {
                  "method": "card",
                  "issuers": ["UTIB"]
                },
                {
                  "method": "netbanking",
                  "banks": ["UTIB"]
                }
              ]
            },
            "upi": {
              "name": "Pay using UPI",
              "instruments": [
                {
                  "method": "upi"
                }
              ]
            },
            "other": {
              "name": "Other Payment modes",
              "instruments": [
                {
                  "method": "card",
                  "issuers": ["ICIC"]
                },
                {
                  "method": 'netbanking',
                }
              ]
            }
          },
          "sequence": ["block.utib", "block.upi", "block.other"],
          "preferences": {
            "show_default_blocks": false
          }
        }
      },
      "handler": function (response) {
        alert("Payment successful! Razorpay payment ID: " + response.razorpay_payment_id);
        window.location.href = "test_selection.php";
      },
      "modal": {
        "ondismiss": function () {
          if (confirm("Are you sure, you want to close the form?")) {
            console.log("Checkout form closed by the user");
          } else {
            console.log("Complete the Payment");
          }
        }
      }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button2').onclick = function (e) {
      rzp1.open();
      e.preventDefault();
    };
  </script>
</body>
</html>