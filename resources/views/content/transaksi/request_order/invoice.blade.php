<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style type="text/css" media="all">
      .clearfix:after {
          content: "";
          display: table;
          clear: both;
        }

        a {
          color: #5D6975;
          text-decoration: underline;
        }

        body {
          position: relative;
          width: 21cm;  
          height: 29.7cm; 
          margin: 0 auto; 
          color: #001028;
          background: #FFFFFF; 
          font-family: Arial, sans-serif; 
          font-size: 12px; 
          font-family: Arial;
        }

        header {
          padding: 10px 0;
          margin-bottom: 30px;
        }

        #logo {
          text-align: center;
          margin-bottom: 10px;
        }

        #logo img {
          width: 200px;
        }

        h1 {
          border-top: 1px solid  #5D6975;
          border-bottom: 1px solid  #5D6975;
          color: #5D6975;
          font-size: 2.4em;
          line-height: 1.4em;
          font-weight: normal;
          text-align: center;
          margin: 0 0 20px 0;
          background: url({{ asset('assets/invoice/dimension.png') }});
        }

        #project {
          float: left;
        }

        #project span {
          color: #5D6975;
          text-align: right;
          width: 52px;
          margin-right: 10px;
          display: inline-block;
          font-size: 0.8em;
        }

        #company {
          float: right;
          text-align: right;
        }

        #project div,
        #company div {
          white-space: nowrap;        
        }

        table {
          width: 100%;
          border-collapse: collapse;
          border-spacing: 0;
          margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
          background: #F5F5F5;
        }

        table th,
        table td {
          text-align: center;
        }

        table th {
          padding: 5px 20px;
          color: #5D6975;
          border-bottom: 1px solid #C1CED9;
          white-space: nowrap;        
          font-weight: normal;
        }

        table .service,
        table .desc {
          text-align: left;
        }

        table td {
          padding: 20px;
          text-align: right;
        }

        table td.service,
        table td.desc {
          vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
          font-size: 1.2em;
        }

        table td.grand {
          border-top: 1px solid #5D6975;;
        }

        #notices .notice {
          color: #5D6975;
          font-size: 1.2em;
        }

        footer {
          color: #5D6975;
          width: 100%;
          height: 30px;
          position: absolute;
          bottom: 0;
          border-top: 1px solid #C1CED9;
          padding: 8px 0;
          text-align: center;
        }  
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('assets/images/pgn-saka.png') }}" >
      </div>
      <h1>{{ $ro->no_ro }}</h1>
      <div id="company" class="clearfix">
        <div>PT PGN Saka</div>



        <div>The Energy 12 Fl.
SCBD Lot 11A
Jl. Jend. Sudirman, Jakarta - Indonesia
,<br /> Jakarta 12190, Indonesia Phones</div>
        <div>Telp : +6221 2995 1000
Fax : +6221 2995 1001</div>
        <div><a href="mailto:admin@sakaenergi.com">admin@sakaenergi.com</a></div>
      </div>
      <div id="project">
        <div><span>CLIENT</span> {{ $ro->user->name }}</div>
        <div><span>DEPARTMENT</span> {{ $ro->department->d_name }}</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">{{ $ro->user->email }}</a></div>
        <div><span>RO DATE</span> {{ date("d F Y",strtotime($ro->created_at)) }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PRODUCT NAME</th>
            <th class="desc">CATEGORY</th>
            <th>SUBCATEGORY</th>
            <th>QTY REQUEST</th>
            <th>QTY APPROVED</th>
          </tr>
        </thead>
        <tbody>
        <?php $total = 0;
          $subtotal = 0
          ?>
        @foreach($ro->detail_ro as $item)
          <tr>
            <td class="service">{{ $item->product->p_name }}</td>
            <td class="desc">{{ $item->product->sub_category->category->cat_name }}</td>
            <td class="unit">{{ $item->product->sub_category->sub_cat_name }}</td>
            <td class="qty">{{ number_format($item->qty_req) }}</td>
            <td class="qty">{{ number_format($item->qty_approve) }}</td>
          </tr>
          <?php $total +=$item->qty_req;
            $subtotal += $item->qty_approve;
          ?>
        @endforeach
        <tr>
            <td colspan="3" class="grand total">Total</td>
            <td class="grand total">{{ number_format($total) }}</td>
            <td class="grand total">{{ number_format($subtotal) }}</td>
          </tr>
        </tbody>
      </table>
      
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>