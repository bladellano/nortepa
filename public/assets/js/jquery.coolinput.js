/**
 * CoolInput Plugin
 * 
 * @version 2.0 (15/12/2011)
 * @requires jQuery v1.2.6+
 * @author Alex Weber <alexweber.com.br>
 * @author Evan Winslow <ewinslow@cs.stanford.edu> (v1.5)
 * @copyright Copyright (c) 2008-2011, Alex Weber
 * @see http://code.alexweber.com.br/jquery/coolinput/
 * @see http://remysharp.com/2007/01/25/jquery-tutorial-text-box-hints/
 * 
 * Distributed under the terms of the GNU General Public License
 * http://www.gnu.org/licenses/gpl-3.0.html
 *
 * Recent Changelog
 *
 * 2.0 (15/12/2011)
 * - Check for HTML5 placeholder attribute support and use it instead of javascript,
 *   if available
 * - HTML5 placeholder support can be ignored
 *
 * 1.5 (10/09/2009)
 * - Added clearOnFocus extra param. Suppose the user wants to use coolinput not
 *   just as a hint, but to get people "jumpstarted" on their input.  For example,
 *   a url input which suggests "http://".  You wouldn't want this to be cleared on
 *   focus, but probably would want it restored on blur if the user leaves the input blank.
 * 
 * - Added persisten extra param. Suppose the user wants the hint to appear only
 *   the first time people see their input.  This seems like a rather uncommon case,
 *   but the implementation was so trivial I figured it was worth making that 100th 
 *   person out of 100 happy.
 * 
 */
;(function($) {
	$.fn.coolinput = function(b) {
		/* Default options */
		var c = {
			hint:null,
			source:"title",
			blurClass:"blur",
			iconClass:false,
			clearOnSubmit:true,
			clearOnFocus:true,
			persistent:true,
			useHtml5:true
		};
		
		if (b && typeof b == "object") {
			$.extend(c,b);
		} else {
			c.hint = b;
		}
		
		// check for HTML5 placeholder attribute support
		c.html5 = c.useHtml5 && ('placeholder' in document.createElement('input'));
		
		return this.each(function() {
			var d = $(this),
			e = c.hint || d.attr(c.source),
			f = c.blurClass;
			
			function g() {
				if (d.val() == "") {
					d.val(e).addClass(f);
				}
			}
			
			function h() {
				if (d.val() == e && d.hasClass(f)) {
					d.val("").removeClass(f);
				}
			}
			
			if (e) {
				// only use coolinput if we don't have HTML5 placeholder support
				if (!c.html5) {
					if (c.persistent) {
						d.blur(g);
					}

					if (c.clearOnFocus) {
						d.focus(h);
					}

					if (c.clearOnSubmit) {
						d.parents("form:first").submit(h);
					}

					if (c.iconClass) {
						d.addClass(c.iconClass);
					}

					g();
				} else {
					d.attr('placeholder', e);
				}
			}
		})
	}
})(jQuery);