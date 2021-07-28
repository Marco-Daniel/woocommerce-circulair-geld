<?php

namespace MDDD;

class UI {
  public static function screen_button( $key, $data, $id, $class ) {
    $field = $id;
    $defaults = array(
      'class'         => 'button-secondary',
      'desc_tip'      => false,
      'description'   => '',
      'title'         => __('Genereer AccessClient token', 'circulair-geld-voor-woocommerce'),
      'button_title'  => __('Genereer token', 'circulair-geld-voor-woocommerce')
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
              <?php __('Log in op uw Circulaire Geld account en ga naar:', 'circulair-geld-voor-woocommerce'); ?>
              <br> <?php __('Persoonlijk > Instellingen > Webshop koppelingen > toegangscodes > Toevoegen > [Vul een beschrijving in] > Opslaan > Activatiecode > Bevestigen', 'circulair-geld-voor-woocommerce'); ?>
              <br> <?php __('Vul de vier-cijferige code hierboven in en klik op', 'circulair-geld-voor-woocommerce'); ?> <b><?php echo wp_kses_post( $data['button_title'] ); ?></b>.
              <br>
              <br> <u> <?php __('Als u deze instellingen niet kan vinden in uw CG-account, dan moeten deze instellingen nog geactiveerd worden voor u.', 'circulair-geld-voor-woocommerce'); ?></u>
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
      'title'         => __('Test inloggegevens', 'circulair-geld-voor-woocommerce'),
      'button_title'  => __('Test inloggegevens', 'circulair-geld-voor-woocommerce')
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
              <?php __('Vergeet niet om eerst uw gebruikersnaam en wachtwoord op te slaan middels de knop onder aan deze pagina.', 'circulair-geld-voor-woocommerce'); ?>
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
      'title'         => __('Scan de QR-code en doneer om bij te dragen aan de verdere ontwikkeling deze plugin.', 'circulair-geld-voor-woocommerce'),
    );
    $data = wp_parse_args($data, $defaults);

    ob_start();
    ?>
    <tr valign="top">
      <th scope="row" class="titledesc">
        <label for="<?php echo esc_attr( $field ); ?>"><?php echo wp_kses_post( $data['title'] ); ?></label>
      </th>
      <td>
        <img src="<?php echo MDDD_CG_PLUGIN_DIR_URL.'/assets/qr-code.png'?>" alt=<?php __( 'doneer middels qr-code', 'circulair-geld-voor-woocommerce') ?> />
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
      'title'      	=> __('Deze plugin wordt u aangeboden door:', 'circulair-geld-voor-woocommerce'),
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
}