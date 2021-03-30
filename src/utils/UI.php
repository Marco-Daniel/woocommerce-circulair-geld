<?php

namespace MDDD;

class UI {
  public static function screen_button( $key, $data, $id, $class ) {
    $field = $id;
    $defaults = array(
      'class'         => 'button-secondary',
      'desc_tip'      => false,
      'description'   => '',
      'title'         => 'Genereer AccessClient token',
      'button_title'  => 'Genereer token'
    );

    $data = wp_parse_args( $data, $defaults );

    ob_start();
    ?>
    <tr valign="top">
      <th scope="row" class="titledesc">
        <label for="<?php echo esc_attr( $field ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
        <?php echo $class->get_tooltip_html( $data ); ?>
      </th>
      <td class="forminp">
        <fieldset>
          <legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
          <form method="post" name="accessClientForm" id="accessClientForm" action="">
            <input type="text" id="accessClientCode" name="accessClientCode" placeholder="AccessClient Activatie Code">
            <button type="submit" class="<?php echo esc_attr( $data['class'] ); ?>" 
              type="submit" 
              name="generateAccesclientButton" 
              id="generateAccesclientButton" 
            >
              <?php echo wp_kses_post( $data['button_title'] ); ?>
            </button>
            <p class="description">
              Log in op uw Circulaire Geld account en ga naar:
              <br> Persoonlijk > Instellingen > Webshop koppelingen > toegangscodes > Toevoegen > [Vul een beschrijving in] > Opslaan > Activatiecode > Bevestigen
              <br> Vul de vier-cijferige code hierboven in en klik op <b><?php echo wp_kses_post( $data['button_title'] ); ?></b>.
              <br>
              <br> <u>Als u deze instellingen niet kan vinden in uw CG-account, dan moeten deze instellingen nog geactiveerd worden voor u.</u>
            </p>
          </form>
        </fieldset>
      </td>
    </tr>
    <?php
    return ob_get_clean();
  }
  
  public static function test_credentials_button( $key, $data, $id, $class ) {
    $field = $id;
    $defaults = array(
      'class'         => 'button-secondary',
      'desc_tip'      => false,
      'description'   => '',
      'title'         => 'Test inloggegevens',
      'button_title'  => 'Test inloggegevens'
    );

    $data = wp_parse_args( $data, $defaults );

    ob_start();
    ?>
    <tr valign="top">
      <th scope="row" class="titledesc">
        <label for="<?php echo esc_attr( $field ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
        <?php echo $class->get_tooltip_html( $data ); ?>
      </th>
      <td class="forminp">
        <fieldset>
          <legend class="screen-reader-text"><span><?php echo wp_kses_post( $data['title'] ); ?></span></legend>
          <form method="post" name="testUserCredentialsForm" id="testUserCredentialsForm" action="">
            <input type="hidden" id="testUserCredentials" name="testUserCredentials" value="test">
            <button type="submit" class="<?php echo esc_attr( $data['class'] ); ?>" 
              type="submit" 
              name="testUserCredentialsButton" 
              id="testUserCredentialsButton" 
            >
              <?php echo wp_kses_post( $data['button_title'] ); ?>
            </button>
            <p class="description">
              Vergeet <em>niet</em> om eerst uw gebruikersnaam en wachtwoord op te slaan middels de knop onder aan deze pagina.
            </p>
          </form>
        </fieldset>
      </td>
    </tr>
    <?php
    return ob_get_clean();
  }
        
  public static function donate_img( $key, $data, $id ) {
    $field = $id;
    $defaults = array(
      'desc_tip'      => false,
      'description'   => '',
      'title'         => 'Scan de QR-code en doneer om bij te dragen aan de verdere ontwikkeling deze plugin.',
    );
    $data = wp_parse_args($data, $defaults);

    ob_start();
    ?>
    <tr valign="top">
      <th scope="row" class="titledesc">
        <label for="<?php echo esc_attr( $field ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
      </th>
      <td>
        <img src="<?php echo MDDD_CG_PLUGIN_DIR_URL.'/assets/qr-code.png'?>" alt="doneer middels qr-code" />
      </td>
    </tr>
    <?php
    return ob_get_clean();
  }
          
  public static function logo_dev( $key, $data, $id ) {
    $field = $id;
    $defaults = array(
      'desc_tip'     => false,
      'description'  => '',
      'title'      	=> 'Deze plugin wordt u aangeboden door:',
    );
    $data = wp_parse_args( $data, $defaults );

    ob_start();
    ?>
    <tr valign="top">
      <th scope="row" class="titledesc">
        <label for="<?php echo esc_attr( $field ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
      </th>
      <td>
        <a href="https://mddd.nl" rel="noopener" target="_blank">
          <img src="<?php echo MDDD_CG_PLUGIN_DIR_URL.'/assets/logo_150px.gif'?>" alt="M.D. Design & Development" />
        </a>
      </td>
    </tr>
    <?php
    return ob_get_clean();
  }

  public static function form_fields() {
    return array(
      'basic_settings_title' 	=> array(
        'title' => __( 'Basis instellingen' ),
        'type'  => 'title',
      ),
      'enabled' => array(
        'title'         => 'Activeer/Deactiveer',
        'label'         => 'Activeer Circulair Geld Gateway',
        'type'          => 'checkbox',
        'description'   => '',
        'default'       => 'no'
      ),
      'testmode' => array(
        'title'         => 'Test mode',
        'label'         => 'Activeer Test Mode',
        'type'          => 'checkbox',
        'description'   => 'gebruikersnaam: demo, wachtwoord: 1234',
        'default'       => 'yes',
        'desc_tip'      => true,
      ),
      'username' => array(
        'title'         => 'Gebruikersnaam',
        'type'          => 'text',
        'description'   => 'Vul hier uw gebruikersnaam in, niet uw email adres!',
        'desc_tip'      => true,
      ),
      'password' => array(
        'title'         => 'Wachtwoord',
        'type'          => 'password',
      ),
      'testUserCredentials' => array(
        'type'          => 'test_credentials_button',
        'desc_tip'      => 'Test uw inloggegevens'
      ),
      'use_accessclient' => array(
        'title'         => 'AccessClient',
        'label'         => 'Activeer AccessClient Mode (deze optie wordt geadviseerd, bij het genereren van een token wordt deze optie automatisch geactiveerd.)',
        'type'          => 'checkbox',
        'description'   => 'Gebruik een anoniem token ipv uw gebruikersnaam en wachtwoord als de gebruiker wordt doorgelinkt naar de betalingspagina, deze optie heeft de voorkeur vanwege veiligheidsredenen.',
        'default'       => 'no',
        'desc_tip'      => true,
      ),
      'accessClientGenerate' => array(
        'type'          => 'screen_button',
        'desc_tip'      => 'gebruikersnaam, wachtwoord en uw activatie code moeten zijn ingevuld voordat de token gegenereerd kan worden!'
      ),
      'accessclient' => array(
        'title'         => 'AccessClient token',
        'type'          => 'password',
        'description'   => 'Hier staat de automatisch gegenereerde anonieme token, hier hoeft u verder niks mee te doen.',
        'desc_tip'      => true,
      ),
      'display_settings_title' => array(
        'title'       	=> __( 'Weergave instellingen' ),
        'type'        	=> 'title',
        'description' 	=> 'Pas hier uw weergave instellingen van deze plugin aan. In veel gevallen zijn de standaard waardes voldoende.',
        ),
      'title' => array(
        'title'        => 'Titel',
        'type'         => 'text',
        'description'  => 'De titel die de bezoeker tijdens check-out ziet.',
        'default'      => 'Circulair Geld',
      ),
      'description' => array(
        'title'        => 'Beschrijving',
        'type'         => 'textarea',
        'description'  => 'De beschrijving die de bezoeker tijdens check-out ziet.',
        'default'      => 'Betaal met Circulair Geld.',
      ),
      'donate_title' 	 => array(
        'title'        => __( ' ' ),
        'type'         => 'title',
      ),
      'donate' => array(
        'type'          => 'donate_img',
      ),
      'developer' => array(
        'type'          => 'logo_dev',
      )
    );
  }
}