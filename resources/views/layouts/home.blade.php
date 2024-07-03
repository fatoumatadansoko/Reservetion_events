<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Votre Titre')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    <style>
    .icons {
      margin-top: 20px;
      display: flex;
      gap: 20px;
    }
    .navbar-custom {
      background-color: white;
    }
    .navbar-nav {
      margin: 0 auto;
    }
    .nav-item {
      margin: 0 40px;
    }
    .navbar-collapse {
      display: flex;
      justify-content: center;
    }
    .btn-connect {
      margin-left: 20px;
      margin-right: 5px;
      background-color: #0D4C9B;
      color: white;
      font-family: 'Lato', sans-serif;
    }
    .navbar-brand .imagenav {
      margin-left: 55px;
    }
    .icons svg {
      width: 30px;
      height: 30px;
    }
    .footer-content {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      flex-wrap: wrap;
    }
    .footer-content > div {
      flex: 1;
      margin-right: 20px;
    }
    .footer-content > div:last-child {
      margin-right: 0;
    }
    .footer-content .logofoot {
      margin-right: 200px;
      margin-top: -30px;
    }
    .card-banner {
      display: flex;
      background-color: #F2F4F6;
    }
    .imagebanner {
      width: 100%;
      height: auto;
    }
    .card-body {
      background-color: #F2F4F6;
    }
    .text-as-button {
      display: inline-block;
      background-color: #0D4C9B;
      color: white;
      font-family: 'Lato', sans-serif;
      text-align: center;
      border-radius: 5px;
      margin-bottom: 20px;
      height: 100px;
      width: 100%;
    }
    .card-title {
      font-family: 'Lato', sans-serif;
      color: white;
      margin: 10px;
    }
    .card-text small {
      font-family: 'Lato', sans-serif;
      color: white;
      font-size: 20px;
    }
    .section-title {
      font-family: 'Lato', sans-serif;
      color: black;
      font-size: 2em;
      margin-bottom: 10px;
      font-weight: 500;
    }
    .icon-calendar {
      margin-right: 15px;
      margin-bottom: 10px;
    }
    .section {
      height: auto; /* Changed for responsiveness */
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      padding: 20px;
    }
    .section-bleu {
      background-color: #F2F4F6;
      margin-top: 30px;
    }
    .section h3 {
      margin-bottom: 20px;
      font-weight: bold;
      font-size: 30px;
    }
    .paragraphe {
      line-height: 1.7;
      margin-bottom: 20px;
      padding: 0 1em; /* Reduced padding for smaller screens */
    }
    .section .btn {
      background-color: #0D4C9B;
    }
    .chiffres {
      background-color: #fff;
      align-items: center;
      width: 100%;
    }
    .nos-chiffres {
      width: 100%;
    }
    h4 {
      font-weight: bold;
      font-size: 70px;
      color: #0D4C9B;
    }
    .nos-chiffres p {
      font-weight: bold;
      text-align: center;
    }
    .event-card {
      position: relative;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: white;
    }
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
    .event-card {
      position: relative;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: rgba(255, 255, 255, 0.072);
    }
    .event-card-img-top {
      height: 200px;
      object-fit: cover;
    }
    .date-badge {
      position: absolute;
      left: 10px;
      background-color: #f2f4f61a;
      padding: 5px 10px;
      border-radius: 5px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .date-day {
      font-size: 1.5rem;
      font-weight: bold;
      color: #0D4C9B;
    }
    .date-month {
      font-size: 0.9rem;
      color: #999;
    }
    .card-body {
      padding: 15px;
      position: relative;
      background: white;
    }
    .card-titlevent {
      font-size: 1.1rem;
      margin-top: 10px;
      margin-left: 50px;
      color: #333;
      background: white;
    }
    .card-textevent {
      font-size: 0.9rem;
      color: #666;
      margin-left: 50px;
      background: white;
    }
    .text-muted {
      color: #3e3a3a !important;
    }
    .card-body .date-badge {
      position: absolute;
      left: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #fff;
      padding: 5px 10px;
      border-radius: 5px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .voirplus {
      color: #0D4C9B;
      font-size: 20px;
      border: solid 1px #0D4C9B;
      background-color: transparent;
      padding: 10px 20px;
    }
    .formulaire {
      background-color: #fff;
    }
    #inputNom, #inputPrenom, #inputEmail, #inputPhone, #inputMessage {
      height: 50px;
      margin-top: 20px;
    }
    #inputMessage {
      height: 140px;
    }
    .contact {
      width: 100%;
    }
    form {
      display: flex;
      flex-direction: column; /* Changed for responsiveness */
      justify-content: center;
      align-items: center; /* Centered for responsiveness */
    }
    .contact .btn-custom {
      background-color: #0D4C9B;
      color: white;
      margin-top: 8px;
    }
    .carousel-control-prev-icon, .carousel-control-next-icon {
      background-color: black;
    }
    .carousel-inner .imagebanner, .carousel-inner .imagesimplon {
      max-width: 100%;
      height: auto;
    }
    .carousel-inner .imagebanner, .carousel-inner .partenaire {
      max-height: 100px;
    }
    .carousel-control-next-icon::before {
      mask: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" fill="%23000" viewBox="0 0 8 8"><path d="M1 0l4 4-4 4V0z"/></svg>') no-repeat;
      background-color: #0D4C9B;
    }
    .carousel-control-prev-icon::before {
      mask: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" fill="%23000" viewBox="0 0 8 8"><path d="M5 0L1 4l4 4V0z"/></svg>') no-repeat;
      background-color: #0D4C9B;
    }

  </style>
</head>
<body>
  @include('layouts.navbar')
  
  <div class="">
    @yield('content')
  </div>

  @include('layouts.footer')
  
  <!-- SVG Symbols -->
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="bootstrap" viewBox="0 0 118 94">
      <title>Bootstrap</title>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
    </symbol>
    <symbol id="facebook" viewBox="0 0 16 16">
      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.93v-5.625H4.897V8.05H6.75V6.275c0-1.843 1.067-2.867 2.704-2.867.785 0 1.6.144 1.6.144v1.759H9.69c-.945 0-1.237.587-1.237 1.188V8.05h2.11l-.338 2.304H8.453v5.625C12.277 15.397 16 12.067 16 8.049z"/>
    </symbol>
    <symbol id="instagram" viewBox="0 0 16 16">
      <path d="M8 0C3.582 0 0 3.582 0 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm0 14.5a6.501 6.501 0 0 1 0-13 6.501 6.501 0 0 1 0 13zm3.5-8a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm-3.5 1.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-1.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
    </symbol>
    <symbol id="twitter" viewBox="0 0 16 16">
      <path d="M16 3.039c-.59.26-1.22.435-1.885.514a3.327 3.327 0 0 0 1.446-1.845 6.693 6.693 0 0 1-2.088.793A3.307 3.307 0 0 0 11.09 2c-1.826 0-3.306 1.48-3.306 3.306 0 .258.03.508.086.75a9.39 9.39 0 0 1-6.814-3.455 3.31 3.31 0 0 0 1.023 4.412 3.267 3.267 0 0 1-1.496-.41v.042c0 1.54 1.096 2.824 2.55 3.115a3.279 3.279 0 0 1-1.492.056c.422 1.317 1.648 2.276 3.098 2.302A6.634 6.634 0 0 1 0 13.026a9.35 9.35 0 0 0 5.066 1.48c6.077 0 9.4-5.035 9.4-9.399 0-.143-.003-.286-.01-.428a6.683 6.683 0 0 0 1.644-1.695z"/>
    </symbol>
  </svg>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
