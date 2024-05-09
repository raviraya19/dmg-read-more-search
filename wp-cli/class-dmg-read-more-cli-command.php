<?php
if (defined('WP_CLI') && WP_CLI) {
	/**
	 * Class to handle a WP-CLI command for searching posts with a specific Gutenberg block.
	 */
	class Dmg_Read_More_Search_Command
	{

		/**
		 * Invokes the WP-CLI command.
		 *
		 * @param array $args Positional arguments.
		 * @param array $assoc_args Associative arguments.
		 */
		public function __invoke($args, $assoc_args)
		{
			// Fetch date parameters and apply default values.
			$dateBefore = $this->get_date_argument($assoc_args, 'date-before', '-30 days');
			$dateAfter = $this->get_date_argument($assoc_args, 'date-after', 'today');

			// Setup the query arguments for WP_Query.
			$queryArgs = [
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => -1, // Retrieve all matching posts.
				'meta_query' => [
					[
						'key' => '_blocks', // Ensure this meta key matches your block storage.
						'value' => 'dmg/read-more-search', // Adjust the value to match your block's identifier.
						'compare' => 'LIKE'
					]
				],
				'date_query' => [
					[
						'after' => $dateAfter,
						'before' => $dateBefore,
						'inclusive' => true
					]
				]
			];

			// Execute the query.
			$query = new WP_Query($queryArgs);

			// Output the results.
			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
					WP_CLI::line(get_the_ID());
				}
				wp_reset_postdata();
			} else {
				WP_CLI::error('No posts found within the date.');
			}
		}

		/**
		 * Retrieves and sanitizes a date argument from the associative arguments array.
		 *
		 * @param array $assoc_args Associative arguments array.
		 * @param string $key Key for the date argument.
		 * @param string $default Default value if the argument is not set.
		 * @return string Date string.
		 */
		private function get_date_argument($assoc_args, $key, $default)
		{
			if (isset($assoc_args[$key])) {
				$date = sanitize_text_field($assoc_args[$key]);
				return date('Y-m-d', strtotime($date));
			}

			return date('Y-m-d', strtotime($default));
		}
	}

	// Register the command with WP-CLI.
	WP_CLI::add_command('dmg-read-more-search', Dmg_Read_More_Search_Command::class);
}
