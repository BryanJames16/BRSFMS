/**
 * zrender: ç”Ÿæˆå”¯ä¸€id
 *
 * @author errorrik (errorrik@gmail.com)
 */

define(
    function() {
        var idStart = 0x0907;

        return function () {
            return 'zr_' + (idStart++);
        };
    }
);
