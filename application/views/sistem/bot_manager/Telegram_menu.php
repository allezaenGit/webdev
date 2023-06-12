
<?php echo _css('selectize,datepicker')?>
<div class="row">
<div class="col-md-12 col-lg-12">
<div class="panel panel-lte">
<div class="panel-heading lte-heading-danger">Menu Manager</div>
<div class="panel-body">

		<a href="<?= site_url("sistem/Bot_Telegram/Register_Bot") ?>" class="btn-lte3 <?php if(@$selected=="register_bot") echo "disable"?> btn-app text-black">
			<i class="fas fa-edit"></i> Register Bot
		</a>
		<a href="<?= site_url("sistem/Bot_Telegram_Service") ?>" class="btn-lte3 <?php if(@$selected=="create_service") echo "disable"?> btn-app text-black">
			
			<i class="fas fa-bullhorn"></i> Create Service
		</a>
		
		<a href="<?= site_url("sistem/Bot_Telegram_Service_CMD") ?>" class="btn-lte3 <?php if(@$selected=="command_bot") echo "disable"?> btn-app text-black">
		
			<i class="fa fa-android"></i> Command BOT
		</a>
		
		
		<a href="<?= site_url("sistem/Bot_Telegram_WebHook") ?>"class="btn-lte3  <?php if(@$selected=="run_service") echo "disable"?> btn-app text-black">
			<i class="fa fa-telegram"></i> Set & Run Service
		</a>
		
		<a href="<?= site_url("sistem/Bot_Telegram_Admin") ?>"class="btn-lte3  <?php if(@$selected=="set_bot_admin") echo "disable"?> btn-app text-black">
			<i class="fa fa-user-secret"></i> Set Bot Admin
		</a>
		
		<a href="<?= site_url("sistem/Bot_Telegram_Client") ?>"class="btn-lte3  <?php if(@$selected=="client_otp_register") echo "disable"?> btn-app text-black">
			<i class="fa fa-group"></i> Client OTP Register
		</a>
		
		<a href="<?= site_url("sistem/Bot_Telegram_Tracking") ?>"class="btn-lte3  <?php if(@$selected=="tracking") echo "disable"?> btn-app text-black">
			<i class="fa fa-group"></i> Tracking Client
		</a>
		
		<a href="<?= site_url("sistem/Bot_Telegram/setting") ?>"class="btn-lte3  <?php if(@$selected=="setting") echo "disable"?> btn-app text-black">
			<i class="fa fa-cogs"></i> Setting
		</a>
		
</div>
</div>
</div>
</div>


