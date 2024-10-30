<?php
/**
 * Plugin Name: COVID19 REAL TIME TRACKER
 * Description: This plugin shows real time data of COVID19 pandemic
 * Version: 1.0.0
 * Author: Ehud Ettun
 * Author URI: http://hatzeeloo.com
 * License: GPL2
 */

// The widget class
class COVID19TRACKER_My_Custom_Widget extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'COVID19TRACKER_my_custom_widget',
			__( 'COVID19 TRACKER WIDGET', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'title'    => '',
			'showworldwide' => '',
			'country'   => '',
		);
		
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<?php // Checkbox ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'checkbox' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>"><?php _e( 'Show Worldwide', 'text_domain' ); ?></label>
		</p>

		<?php // Dropdown ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e( 'Select', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select' ); ?>" id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat">
			<?php
			// Your options array
    $options = array('' => __( 'Choose Country', 'text_domain' ));
$countries = array(
    'AF'=>'AFGHANISTAN',
    'AL'=>'ALBANIA',
    'DZ'=>'ALGERIA',
    'AS'=>'AMERICAN SAMOA',
    'AD'=>'ANDORRA',
    'AO'=>'ANGOLA',
    'AI'=>'ANGUILLA',
    'AQ'=>'ANTARCTICA',
    'AG'=>'ANTIGUA AND BARBUDA',
    'AR'=>'ARGENTINA',
    'AM'=>'ARMENIA',
    'AW'=>'ARUBA',
    'AU'=>'AUSTRALIA',
    'AT'=>'AUSTRIA',
    'AZ'=>'AZERBAIJAN',
    'BS'=>'BAHAMAS',
    'BH'=>'BAHRAIN',
    'BD'=>'BANGLADESH',
    'BB'=>'BARBADOS',
    'BY'=>'BELARUS',
    'BE'=>'BELGIUM',
    'BZ'=>'BELIZE',
    'BJ'=>'BENIN',
    'BM'=>'BERMUDA',
    'BT'=>'BHUTAN',
    'BO'=>'BOLIVIA',
    'BA'=>'BOSNIA AND HERZEGOVINA',
    'BW'=>'BOTSWANA',
    'BV'=>'BOUVET ISLAND',
    'BR'=>'BRAZIL',
    'IO'=>'BRITISH INDIAN OCEAN TERRITORY',
    'BN'=>'BRUNEI DARUSSALAM',
    'BG'=>'BULGARIA',
    'BF'=>'BURKINA FASO',
    'BI'=>'BURUNDI',
    'KH'=>'CAMBODIA',
    'CM'=>'CAMEROON',
    'CA'=>'CANADA',
    'CV'=>'CAPE VERDE',
    'KY'=>'CAYMAN ISLANDS',
    'CF'=>'CENTRAL AFRICAN REPUBLIC',
    'TD'=>'CHAD',
    'CL'=>'CHILE',
    'CN'=>'CHINA',
    'CX'=>'CHRISTMAS ISLAND',
    'CC'=>'COCOS (KEELING) ISLANDS',
    'CO'=>'COLOMBIA',
    'KM'=>'COMOROS',
    'CG'=>'CONGO',
    'CD'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
    'CK'=>'COOK ISLANDS',
    'CR'=>'COSTA RICA',
    'CI'=>'COTE D IVOIRE',
    'HR'=>'CROATIA',
    'CU'=>'CUBA',
    'CY'=>'CYPRUS',
    'CZ'=>'CZECH REPUBLIC',
    'DK'=>'DENMARK',
    'DJ'=>'DJIBOUTI',
    'DM'=>'DOMINICA',
    'DO'=>'DOMINICAN REPUBLIC',
    'TP'=>'EAST TIMOR',
    'EC'=>'ECUADOR',
    'EG'=>'EGYPT',
    'SV'=>'EL SALVADOR',
    'GQ'=>'EQUATORIAL GUINEA',
    'ER'=>'ERITREA',
    'EE'=>'ESTONIA',
    'ET'=>'ETHIOPIA',
    'FK'=>'FALKLAND ISLANDS (MALVINAS)',
    'FO'=>'FAROE ISLANDS',
    'FJ'=>'FIJI',
    'FI'=>'FINLAND',
    'FR'=>'FRANCE',
    'GF'=>'FRENCH GUIANA',
    'PF'=>'FRENCH POLYNESIA',
    'TF'=>'FRENCH SOUTHERN TERRITORIES',
    'GA'=>'GABON',
    'GM'=>'GAMBIA',
    'GE'=>'GEORGIA',
    'DE'=>'GERMANY',
    'GH'=>'GHANA',
    'GI'=>'GIBRALTAR',
    'GR'=>'GREECE',
    'GL'=>'GREENLAND',
    'GD'=>'GRENADA',
    'GP'=>'GUADELOUPE',
    'GU'=>'GUAM',
    'GT'=>'GUATEMALA',
    'GN'=>'GUINEA',
    'GW'=>'GUINEA-BISSAU',
    'GY'=>'GUYANA',
    'HT'=>'HAITI',
    'HM'=>'HEARD ISLAND AND MCDONALD ISLANDS',
    'VA'=>'HOLY SEE (VATICAN CITY STATE)',
    'HN'=>'HONDURAS',
    'HK'=>'HONG KONG',
    'HU'=>'HUNGARY',
    'IS'=>'ICELAND',
    'IN'=>'INDIA',
    'ID'=>'INDONESIA',
    'IR'=>'IRAN, ISLAMIC REPUBLIC OF',
    'IQ'=>'IRAQ',
    'IE'=>'IRELAND',
    'IL'=>'ISRAEL',
    'IT'=>'ITALY',
    'JM'=>'JAMAICA',
    'JP'=>'JAPAN',
    'JO'=>'JORDAN',
    'KZ'=>'KAZAKSTAN',
    'KE'=>'KENYA',
    'KI'=>'KIRIBATI',
    'KP'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF',
    'KR'=>'KOREA REPUBLIC OF',
    'KW'=>'KUWAIT',
    'KG'=>'KYRGYZSTAN',
    'LA'=>'LAO PEOPLES DEMOCRATIC REPUBLIC',
    'LV'=>'LATVIA',
    'LB'=>'LEBANON',
    'LS'=>'LESOTHO',
    'LR'=>'LIBERIA',
    'LY'=>'LIBYAN ARAB JAMAHIRIYA',
    'LI'=>'LIECHTENSTEIN',
    'LT'=>'LITHUANIA',
    'LU'=>'LUXEMBOURG',
    'MO'=>'MACAU',
    'MK'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
    'MG'=>'MADAGASCAR',
    'MW'=>'MALAWI',
    'MY'=>'MALAYSIA',
    'MV'=>'MALDIVES',
    'ML'=>'MALI',
    'MT'=>'MALTA',
    'MH'=>'MARSHALL ISLANDS',
    'MQ'=>'MARTINIQUE',
    'MR'=>'MAURITANIA',
    'MU'=>'MAURITIUS',
    'YT'=>'MAYOTTE',
    'MX'=>'MEXICO',
    'FM'=>'MICRONESIA, FEDERATED STATES OF',
    'MD'=>'MOLDOVA, REPUBLIC OF',
    'MC'=>'MONACO',
    'MN'=>'MONGOLIA',
    'MS'=>'MONTSERRAT',
    'MA'=>'MOROCCO',
    'MZ'=>'MOZAMBIQUE',
    'MM'=>'MYANMAR',
    'NA'=>'NAMIBIA',
    'NR'=>'NAURU',
    'NP'=>'NEPAL',
    'NL'=>'NETHERLANDS',
    'AN'=>'NETHERLANDS ANTILLES',
    'NC'=>'NEW CALEDONIA',
    'NZ'=>'NEW ZEALAND',
    'NI'=>'NICARAGUA',
    'NE'=>'NIGER',
    'NG'=>'NIGERIA',
    'NU'=>'NIUE',
    'NF'=>'NORFOLK ISLAND',
    'MP'=>'NORTHERN MARIANA ISLANDS',
    'NO'=>'NORWAY',
    'OM'=>'OMAN',
    'PK'=>'PAKISTAN',
    'PW'=>'PALAU',
    'PS'=>'PALESTINIAN TERRITORY, OCCUPIED',
    'PA'=>'PANAMA',
    'PG'=>'PAPUA NEW GUINEA',
    'PY'=>'PARAGUAY',
    'PE'=>'PERU',
    'PH'=>'PHILIPPINES',
    'PN'=>'PITCAIRN',
    'PL'=>'POLAND',
    'PT'=>'PORTUGAL',
    'PR'=>'PUERTO RICO',
    'QA'=>'QATAR',
    'RE'=>'REUNION',
    'RO'=>'ROMANIA',
    'RU'=>'RUSSIAN FEDERATION',
    'RW'=>'RWANDA',
    'SH'=>'SAINT HELENA',
    'KN'=>'SAINT KITTS AND NEVIS',
    'LC'=>'SAINT LUCIA',
    'PM'=>'SAINT PIERRE AND MIQUELON',
    'VC'=>'SAINT VINCENT AND THE GRENADINES',
    'WS'=>'SAMOA',
    'SM'=>'SAN MARINO',
    'ST'=>'SAO TOME AND PRINCIPE',
    'SA'=>'SAUDI ARABIA',
    'SN'=>'SENEGAL',
    'SC'=>'SEYCHELLES',
    'SL'=>'SIERRA LEONE',
    'SG'=>'SINGAPORE',
    'SK'=>'SLOVAKIA',
    'SI'=>'SLOVENIA',
    'SB'=>'SOLOMON ISLANDS',
    'SO'=>'SOMALIA',
    'ZA'=>'SOUTH AFRICA',
    'GS'=>'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
    'ES'=>'SPAIN',
    'LK'=>'SRI LANKA',
    'SD'=>'SUDAN',
    'SR'=>'SURINAME',
    'SJ'=>'SVALBARD AND JAN MAYEN',
    'SZ'=>'SWAZILAND',
    'SE'=>'SWEDEN',
    'CH'=>'SWITZERLAND',
    'SY'=>'SYRIAN ARAB REPUBLIC',
    'TW'=>'TAIWAN, PROVINCE OF CHINA',
    'TJ'=>'TAJIKISTAN',
    'TZ'=>'TANZANIA, UNITED REPUBLIC OF',
    'TH'=>'THAILAND',
    'TG'=>'TOGO',
    'TK'=>'TOKELAU',
    'TO'=>'TONGA',
    'TT'=>'TRINIDAD AND TOBAGO',
    'TN'=>'TUNISIA',
    'TR'=>'TURKEY',
    'TM'=>'TURKMENISTAN',
    'TC'=>'TURKS AND CAICOS ISLANDS',
    'TV'=>'TUVALU',
    'UG'=>'UGANDA',
    'UA'=>'UKRAINE',
    'AE'=>'UNITED ARAB EMIRATES',
    'GB'=>'UNITED KINGDOM',
    'US'=>'UNITED STATES',
    'UM'=>'UNITED STATES MINOR OUTLYING ISLANDS',
    'UY'=>'URUGUAY',
    'UZ'=>'UZBEKISTAN',
    'VU'=>'VANUATU',
    'VE'=>'VENEZUELA',
    'VN'=>'VIET NAM',
    'VG'=>'VIRGIN ISLANDS, BRITISH',
    'VI'=>'VIRGIN ISLANDS, U.S.',
    'WF'=>'WALLIS AND FUTUNA',
    'EH'=>'WESTERN SAHARA',
    'YE'=>'YEMEN',
    'YU'=>'YUGOSLAVIA',
    'ZM'=>'ZAMBIA',
    'ZW'=>'ZIMBABWE',
  );
        foreach($countries as $code=>$country){
                $options[$country] =  __($country, 'text_domain');
            }
            
			
			

			// Loop through options and add each one to the select dropdown
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select, $key, false ) . '>'. $name . '</option>';

			} ?>
			</select>
		</p>

	<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['text']     = isset( $new_instance['text'] ) ? wp_strip_all_tags( $new_instance['text'] ) : '';
		$instance['textarea'] = isset( $new_instance['textarea'] ) ? wp_kses_post( $new_instance['textarea'] ) : '';
		$instance['checkbox'] = isset( $new_instance['checkbox'] ) ? 1 : false;
		$instance['select']   = isset( $new_instance['select'] ) ? wp_strip_all_tags( $new_instance['select'] ) : '';
		return $instance;
	}

	// Display the widget
	public function widget( $args, $instance ) {

		extract( $args );

		// Check the widget options
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$text     = isset( $instance['text'] ) ? $instance['text'] : '';
		$textarea = isset( $instance['textarea'] ) ?$instance['textarea'] : '';
		$select   = isset( $instance['select'] ) ? $instance['select'] : '';
		$checkbox = ! empty( $instance['checkbox'] ) ? $instance['checkbox'] : false;

		// WordPress core before_widget hook (always include )
		echo $before_widget;

		// Display the widget
		echo '<div class="widget-text wp_widget_plugin_box">';

			// Display widget title if defined
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			// Display the Country data
			$url = 'https://corona.lmao.ninja/countries/'.$select;
			$result = wp_remote_retrieve_body( wp_remote_get( $url ));
			$data = json_decode($result, true);
			
            echo "<h3>".$data['country']."<h3>";
            //echo "<h4>Cases: ".$data['cases'].'</h4>';
            echo "<h4>Active Cases: ".$data['cases'].'</h4>';
            echo "<h4>Recovered: ".$data['recovered'].'</h4>';
            echo "<h4>Dead: ".$data['deaths'].'</h4>';
            echo "<h4>Critical: ".$data['critical'].'</h4>';
            
			// Display something if checkbox is true
			if ( $checkbox ) {
			$worldurl = 'https://corona.lmao.ninja/all';
			$worldresult = wp_remote_retrieve_body( wp_remote_get( $worldurl ) );
            $worlddata = json_decode($worldresult, true);
            
            echo "<h3>Worldwide<h3>";
            //echo "<h4>Cases: ".$worlddata['cases'].'</h4>';
            echo "<h4>Active Cases: ".$worlddata['cases'].'</h4>';
            echo "<h4>Recovered: ".$worlddata['recovered'].'</h4>';
            echo "<h4>Dead: ".$worlddata['deaths'].'</h4>';
			}

		echo '</div>';

		// WordPress core after_widget hook (always include )
		echo $after_widget;

	}

}

// Register the widget
function COVID19TRACKER_my_register_custom_widget() {
	register_widget( 'COVID19TRACKER_My_Custom_Widget' );
}
add_action( 'widgets_init', 'COVID19TRACKER_my_register_custom_widget' );