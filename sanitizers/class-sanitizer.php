<?php
/**
 * Sanitizer
 *
 * @package Google\AMP_Clean_Mega_Menu
 */

namespace Google\AMP_Clean_Mega_Menu;

use AMP_Base_Sanitizer;
use DOMElement;
use DOMXPath;
use DOMNodeList;

/**
 * Class Sanitizer
 */
class Sanitizer extends AMP_Base_Sanitizer {

	/**
	 * Sanitize.
	 */
	public function sanitize() {
		$xpath = new DOMXPath( $this->dom );

		// Get all the form elements decents of amp-mega-menu.
		$forms = $xpath->query( '//amp-mega-menu//form' );

		if ( $forms instanceof DOMNodeList && $forms->length > 0 ) {
			foreach ( $forms as $form ) {
				if ( $form instanceof DOMElement ) {
					// Remove the form.
					$form->parentNode->removeChild( $form );
				}
			}
		}
	}
}
