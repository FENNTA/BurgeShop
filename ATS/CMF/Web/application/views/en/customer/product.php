<link rel="stylesheet" type="text/css" href="{styles_url}/colorbox.css" />
<script src="{scripts_url}/colorbox.js"></script>
  
<div class="main">
	<div class="container">
		<div class="row post-cats">
			<?php foreach($pcategories as $cat) { 
				if($cat['is_hidden'])
					continue;
			?>
				<div class="">
					<a href="<?php echo $cat['url'];?>">
						<?php echo $cat['name'];?>
					</a>
				</div>
			<?php } ?>
		</div>

		<h1><?php echo $product_info['pc_title'];?></h1>			
		<div class="post-date"><?php echo str_replace("-","/",$product_info['product_date']);?></div>

		<h4>{price_text}: <?php echo price_separator($product_info['product_price']);?> {currency_text}</h4>
		<br>
		<div class='row'>
			<?php echo form_open($page_link,array());?>
				<input type="hidden" name="post_type" value="add_to_cart"/>
				<input type="hidden" name="options[op1]" value="<?php echo explode(" ",get_current_time())[0];?>"/>
				<input type="hidden" name="options[op2]" value="<?php echo explode(" ",get_current_time())[1];?>"/>

				<div class='row'>
					<div class='three columns'>{quantity_text}:</div>
					<div class='two columns'>
						<input type='number' name='quantity' class='full-width' value='1'/>
					</div>
					<div class="three columns anti-float">
						<input type="submit" class="button sub-primary button-type1 " value="{add_to_cart_text}"/>
					</div>
				</div>
			<?php echo form_close();?>
		</div>
		<br>
		<div class="row">
			<?php if($product_info['pc_image']) { ?>
				<div class="post-img">
					<img class="lazy-load" data-ll-type="src"
						data-ll-url="<?php echo $product_info['pc_image'];?>"
					/>
				</div>
				<br><br>
			<?php } ?>
		</div>
		<div class="row">
			<div class="twelve columns post-content">
				<?php echo $product_info['pc_content'] ?>
			</div>
		</div>
		<?php if($product_gallery){ ?>
			<div class="row post-gallery">
				<?php 
					foreach($product_gallery as $img)
					{ 
				?>
						<div class="four columns img-div" title="<?php echo $img['text'];?>"  href="{product_gallery_url}/<?php echo $img['image'];?>" >
							<div class="img lazy-load"  data-ll-url="{product_gallery_url}/<?php echo $img['image'];?>"
							 data-ll-type="background-image" >
							</div>
							<div class="text">
								<?php echo $img['text'];?>
							</div>
						</div>
				<?php 
					} 
				?>

				<script type="text/javascript">

					$(window).load(function()
					{
						$("body").addClass("product-page");
						$(window).on("resize",setColorBox);
						setColorBox();
					});

					function setColorBox()
					{
						$.colorbox.remove();
						$(".img-div").unbind("click");

						if($(window).width() < 600)
							$(".img-div").click(function(event)
							{
								window.open($(event.target).parent().attr("href"));
							});
						else
							$(".img-div").colorbox({
								rel:"group"
								,iframe:false
								,width:"80%"
								,height:"80%"
								,opacity:.4
								,fixed:true
								,current:"{image_text} {current} {from_text} {total}" 

							});
					}
				</script>
			</div>
		<?php } ?>
	</div>
</div>