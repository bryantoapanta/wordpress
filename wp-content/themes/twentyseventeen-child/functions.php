<?php
function enqueue_styles_child_theme()
{

	$parent_style = 'twentyseventeen-style';
	$child_style  = 'twentyseventeen-child-style';

	wp_enqueue_style(
		$parent_style,
		get_template_directory_uri() . '/style.css'
	);

	wp_enqueue_style(
		$child_style,
		get_stylesheet_directory_uri() . '/style.css',
		array($parent_style),
		wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'enqueue_styles_child_theme');



// modificar pagina gestionar 
add_filter('the_content', 'dcms_list_data');

function dcms_list_data($content)
{
	$slug_page = 'gestionar'; //slug de la página en donde se mostrará la tabla
	$table_name = 'paginas_portal'; // nombre de la tabla
	$dbuser     = defined('DB_USER') ? DB_USER : '';
	$dbpassword = defined('DB_PASSWORD') ? DB_PASSWORD : '';
	$dbname     = 'apoyo_luxenter';
	$dbhost     = defined('DB_HOST') ? DB_HOST : '';

	$wpdb = new wpdb($dbuser, $dbpassword, $dbname, $dbhost);

	if (is_page($slug_page)) {

		$items = $wpdb->get_results("SELECT * FROM $table_name limit 10");
		$result = '';

		// var_dump($items);
		// nombre de los campos de la tabla
		foreach ($items as $item) {
			$result .= '<tr>
				<td>' . $item->nombre_solapa . '</td>
				<td><a href="' . $item->url_opcion . '">' . $item->nombre_opcion . '<a></td>
				<td>usuario -> '.$_SESSION["user"].'</td>
			</tr>';
		}

		$template = '<table class="table-data">
			          <tr>
			            <th>ID</th>
			            <th>Nombre</th>
			          </tr>
			          {data}
			        </table>';

		return $content . str_replace('{data}', $result, $template);
	}

	return $content;
}
