<!-- header.phpをインクルードする -->
<?php get_header(); ?>

<h2 class="pageTitle">モデルコース<span>course</span></h2>
<?php get_template_part('template-parts/breadcrumb'); ?>

<!-- メインループの開始 -->
<?php if (have_posts()) : ?>
	<!-- 繰り返し処理の開始 -->
	<?php while (have_posts()) :  the_post(); ?>
		<main class="main">
			<section class="sec">
				<div class="container">
					<div class="article article-menu">
						<div class="row">
							<div class="col-12 col-md-6">
								<h2 class="article_title"><?php the_title(); ?></h2>
								<div class="content">
									<?php the_content(); ?>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="article_pic">
									<?php
									$pic = get_field('pic');
									// 大サイズ画面のURL
									$pic_url = $pic['sizes']['large'];
									?>
									<img src="<?php echo $pic_url; ?>" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="info">
					<div class="container">
						<ul class="info_list">
							<li>
								<b>価格</b>
								<span><?php the_field('price'); ?></span>
							</li>
							<li>
								<b>カロリー</b>
								<span><?php echo number_format(get_field('calorie')); ?>kcal</span>
							</li>
							<li>
								<b>アレルギー</b>
								<span>
									<?php
									$allergies = get_field('allergies');
									foreach ($allergies as $key => $allergy) {
										echo $allergy;
										if ($allergy !== end($allergies)) {
											echo '、';
										}
									}
									?>
								</span>
							</li>
							<li>
								<b>予約</b>
								<?php if (get_field('reservation')) : ?>
									<span>必要あり</span>
								<?php else : ?>
									<span>必要なし</span>
								<?php endif; ?>
							</li>
						</ul>
					</div>
				</div>
			</section>
		</main>
	<?php endwhile; ?>
	<!-- メインループの終了 -->
<?php endif; ?>

<!-- header.phpをインクルードする -->
<?php get_footer(); ?>
