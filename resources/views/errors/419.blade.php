@extends('\layouts\layoutsmap')



@section('cdn')

<style>
    

#notfound {
  position: relative;
  height: 100vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 520px;
  width: 100%;
  line-height: 1.4;
}

.notfound>div:first-child {
  padding-left: 200px;
  padding-top: 12px;
  height: 170px;
  margin-bottom: 20px;
}

.notfound .notfound-404 {
  position: absolute;
  left: 0;
  top: 0;
  width: 170px;
  height: 170px;
  background: #333333;
  border-radius: 7px;
  -webkit-box-shadow: 0px 0px 0px 10px #004085 inset, 0px 0px 0px 20px  inset;
          box-shadow: 0px 0px 0px 10px #004085 inset, 0px 0px 0px 20px #fff inset;
}

.notfound .notfound-404 h1 {

  color:white;
  font-size: 118px;
  margin: 0px;
  position: absolute;
  left: 50%;
  top: 45%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  display: inline-block;
  height: 60px;
  line-height: 60px;
}

.notfound h2 {

  font-size: 68px;
  color: #333333;
  font-weight: 400;
  text-transform: uppercase;
  margin: 0px;
  line-height: 1.1;
}

.notfound p {

  font-size: 16px;
  font-weight: 400;
  color: #33333;
  margin-top: 5px;
}

.notfound a {

  color: #e01818;
  font-weight: 400;
  text-decoration: none;
}

@media only screen and (max-width: 480px) {
  .notfound {
    padding-left: 15px;
    padding-right: 15px;
  }
  .notfound>div:first-child {
    padding: 0px;
    height: auto;
  }
  .notfound .notfound-404 {
    position: relative;
    margin-bottom: 15px;
  }
  .notfound h2 {
    font-size: 42px;
  }
</style>

@endsection

@section('content')

<div id="notfound">
		<div class="notfound">
			<div>
				<div class="notfound-404">
					<h1>!</h1>
				</div>
				<h2>Error<br>419</h2>
			</div>
			<p>The page has expired due to inactivity<a href="/">Back to homepage</a></p>
		</div>
	</div>


@endsection