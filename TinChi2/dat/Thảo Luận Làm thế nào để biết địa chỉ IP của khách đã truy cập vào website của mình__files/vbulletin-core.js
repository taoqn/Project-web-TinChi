/*======================================================================*\
|| #################################################################### ||
|| # vBulletin 4.2.0
|| # ---------------------------------------------------------------- # ||
|| # Copyright Â©2000-2012 vBulletin Solutions Inc. All Rights Reserved. ||
|| # This file may not be redistributed in whole or significant part. # ||
|| # ---------------- VBULLETIN IS NOT FREE SOFTWARE ---------------- # ||
|| # http://www.vbulletin.com | http://www.vbulletin.com/license.html # ||
|| #################################################################### ||
\*======================================================================*/
if (window.console === undefined) {
    window.console = {};
    var names = ["log", "debug", "info", "warn", "error", "assert", "dir", "dirxml", "group", "groupEnd", "time", "timeEnd", "count", "trace", "profile", "profileEnd"];
    for (var i = 0; i < names.length; ++i) {
        window.console[names[i]] = function () {}
    }
}
var BBURL = (typeof (BBURL) == "undefined" ? "" : BBURL);
var SESSIONURL = (typeof (SESSIONURL) == "undefined" ? "" : SESSIONURL);
var SECURITYTOKEN = (typeof (SECURITYTOKEN) == "undefined" ? "" : SECURITYTOKEN);
var vbphrase = (typeof (vbphrase) == "undefined" ? new Array() : vbphrase);
var vB_Editor = new Array();
var ignorequotechars = false;
var pagenavcounter = 0;
var is_regexp = (window.RegExp) ? true : false;
var AJAX_Compatible = false;
var viewport_info = null;
var vB_Default_Timeout = 15000;
var userAgent = navigator.userAgent.toLowerCase();
var is_opera = (YAHOO.env.ua.opera > 0);
var is_saf = (YAHOO.env.ua.webkit > 0);
var is_webtv = (userAgent.indexOf("webtv") != -1);
var is_ie = ((YAHOO.env.ua.ie > 0) && (!is_opera) && (!is_saf) && (!is_webtv));
var is_ie4 = (YAHOO.env.ua.ie == 4);
var is_ie7 = (YAHOO.env.ua.ie >= 7);
var is_ie6 = (YAHOO.env.ua.ie == 6);
var is_ps3 = (userAgent.indexOf("playstation 3") != -1);
var is_moz = (YAHOO.env.ua.gecko > 0);
var is_kon = (userAgent.indexOf("konqueror") != -1);
var is_ns = ((userAgent.indexOf("compatible") == -1) && (userAgent.indexOf("mozilla") != -1) && (!is_opera) && (!is_webtv) && (!is_saf));
var is_ns4 = ((is_ns) && (parseInt(navigator.appVersion) == 4));
var is_mac = (userAgent.indexOf("mac") != -1);
var pointer_cursor = (is_ie ? "hand" : "pointer");
String.prototype.vBlength = function () {
    return (is_ie && this.indexOf("\n") != -1) ? this.replace(/\r?\n/g, "_").length : this.length
};
if ("1234".substr(-2, 2) == "12") {
    String.prototype.substr_orig = String.prototype.substr;
    String.prototype.substr = function (B, A) {
        if (typeof (A) == "undefined") {
            return this.substr_orig((B < 0 ? this.length + B : B))
        } else {
            return this.substr_orig((B < 0 ? this.length + B : B), A)
        }
    }
}
if (typeof Array.prototype.shift === "undefined") {
    Array.prototype.shift = function () {
        for (var C = 0, A = this[0], B = this.length - 1; C < B; C++) {
            this[C] = this[C + 1]
        }
        this.length--;
        return A
    }
}
function fetch_object(A) {
    if (document.getElementById) {
        return document.getElementById(A)
    } else {
        if (document.all) {
            return document.all[A]
        } else {
            if (document.layers) {
                return document.layers[A]
            } else {
                return null
            }
        }
    }
}
function fetch_tags(B, A) {
    if (B == null) {
        return new Array()
    } else {
        if (typeof B.getElementsByTagName != "undefined") {
            return B.getElementsByTagName(A)
        } else {
            if (B.all && B.all.tags) {
                return B.all.tags(A)
            } else {
                return new Array()
            }
        }
    }
}
function crc32(D) {
    var B = "00000000 77073096 EE0E612C 990951BA 076DC419 706AF48F E963A535 9E6495A3 0EDB8832 79DCB8A4 E0D5E91E 97D2D988 09B64C2B 7EB17CBD E7B82D07 90BF1D91 1DB71064 6AB020F2 F3B97148 84BE41DE 1ADAD47D 6DDDE4EB F4D4B551 83D385C7 136C9856 646BA8C0 FD62F97A 8A65C9EC 14015C4F 63066CD9 FA0F3D63 8D080DF5 3B6E20C8 4C69105E D56041E4 A2677172 3C03E4D1 4B04D447 D20D85FD A50AB56B 35B5A8FA 42B2986C DBBBC9D6 ACBCF940 32D86CE3 45DF5C75 DCD60DCF ABD13D59 26D930AC 51DE003A C8D75180 BFD06116 21B4F4B5 56B3C423 CFBA9599 B8BDA50F 2802B89E 5F058808 C60CD9B2 B10BE924 2F6F7C87 58684C11 C1611DAB B6662D3D 76DC4190 01DB7106 98D220BC EFD5102A 71B18589 06B6B51F 9FBFE4A5 E8B8D433 7807C9A2 0F00F934 9609A88E E10E9818 7F6A0DBB 086D3D2D 91646C97 E6635C01 6B6B51F4 1C6C6162 856530D8 F262004E 6C0695ED 1B01A57B 8208F4C1 F50FC457 65B0D9C6 12B7E950 8BBEB8EA FCB9887C 62DD1DDF 15DA2D49 8CD37CF3 FBD44C65 4DB26158 3AB551CE A3BC0074 D4BB30E2 4ADFA541 3DD895D7 A4D1C46D D3D6F4FB 4369E96A 346ED9FC AD678846 DA60B8D0 44042D73 33031DE5 AA0A4C5F DD0D7CC9 5005713C 270241AA BE0B1010 C90C2086 5768B525 206F85B3 B966D409 CE61E49F 5EDEF90E 29D9C998 B0D09822 C7D7A8B4 59B33D17 2EB40D81 B7BD5C3B C0BA6CAD EDB88320 9ABFB3B6 03B6E20C 74B1D29A EAD54739 9DD277AF 04DB2615 73DC1683 E3630B12 94643B84 0D6D6A3E 7A6A5AA8 E40ECF0B 9309FF9D 0A00AE27 7D079EB1 F00F9344 8708A3D2 1E01F268 6906C2FE F762575D 806567CB 196C3671 6E6B06E7 FED41B76 89D32BE0 10DA7A5A 67DD4ACC F9B9DF6F 8EBEEFF9 17B7BE43 60B08ED5 D6D6A3E8 A1D1937E 38D8C2C4 4FDFF252 D1BB67F1 A6BC5767 3FB506DD 48B2364B D80D2BDA AF0A1B4C 36034AF6 41047A60 DF60EFC3 A867DF55 316E8EEF 4669BE79 CB61B38C BC66831A 256FD2A0 5268E236 CC0C7795 BB0B4703 220216B9 5505262F C5BA3BBE B2BD0B28 2BB45A92 5CB36A04 C2D7FFA7 B5D0CF31 2CD99E8B 5BDEAE1D 9B64C2B0 EC63F226 756AA39C 026D930A 9C0906A9 EB0E363F 72076785 05005713 95BF4A82 E2B87A14 7BB12BAE 0CB61B38 92D28E9B E5D5BE0D 7CDCEFB7 0BDBDF21 86D3D2D4 F1D4E242 68DDB3F8 1FDA836E 81BE16CD F6B9265B 6FB077E1 18B74777 88085AE6 FF0F6A70 66063BCA 11010B5C 8F659EFF F862AE69 616BFFD3 166CCF45 A00AE278 D70DD2EE 4E048354 3903B3C2 A7672661 D06016F7 4969474D 3E6E77DB AED16A4A D9D65ADC 40DF0B66 37D83BF0 A9BCAE53 DEBB9EC5 47B2CF7F 30B5FFE9 BDBDF21C CABAC28A 53B39330 24B4A3A6 BAD03605 CDD70693 54DE5729 23D967BF B3667A2E C4614AB8 5D681B02 2A6F2B94 B40BBE37 C30C8EA1 5A05DF1B 2D02EF8D";
    var C = -1;
    var A = 0,
        F = 0;
    for (var E = 0; E < D.length; E++) {
        F = (C ^ D.charCodeAt(E)) & 255;
        A = "0x" + B.substr(F * 9, 8);
        C = (C >>> 8) ^ A
    }
    return C ^ (-1)
}
function fetch_tag_count(B, A) {
    return fetch_tags(B, A).length
}
function do_an_e(A) {
    if (!A || is_ie) {
        window.event.returnValue = false;
        window.event.cancelBubble = true;
        return window.event
    } else {
        A.stopPropagation();
        A.preventDefault();
        return A
    }
}
function e_by_gum(A) {
    if (!A || is_ie) {
        window.event.cancelBubble = true;
        return window.event
    } else {
        if (A.target.type == "submit") {
            A.target.form.submit()
        }
        A.stopPropagation();
        return A
    }
}
function validatemessage(B, D, A) {
    if (D.length < 1) {
        alert(vbphrase.must_enter_subject);
        return false
    } else {
        var C = PHP.trim(stripcode(B, false, ignorequotechars));
        if (C.length < A) {
            if (document.getElementById("qc_error_div") != undefined) {
                YAHOO.util.Dom.get("qc_error_list").innerHTML = construct_phrase(vbphrase.message_too_short, A);
                YAHOO.util.Dom.removeClass("qc_error_div", "hidden")
            } else {
                alert(construct_phrase(vbphrase.message_too_short, A))
            }
            return false
        } else {
            if (typeof (document.forms.vbform) != "undefined" && typeof (document.forms.vbform.imagestamp) != "undefined") {
                document.forms.vbform.imagestamp.failed = false;
                if (document.forms.vbform.imagestamp.value.length != 6) {
                    alert(vbphrase.complete_image_verification);
                    document.forms.vbform.imagestamp.failed = true;
                    document.forms.vbform.imagestamp.focus();
                    return false
                } else {
                    return true
                }
            } else {
                return true
            }
        }
    }
}
function stripcode(F, G, B) {
    if (!is_regexp) {
        return F
    }
    if (B) {
        var C = new Date().getTime();
        while ((startindex = PHP.stripos(F, "[quote")) !== false) {
            if (new Date().getTime() - C > 2000) {
                break
            }
            if ((stopindex = PHP.stripos(F, "[/quote]")) !== false) {
                fragment = F.substr(startindex, stopindex - startindex + 8);
                F = F.replace(fragment, "")
            } else {
                break
            }
            F = PHP.trim(F)
        }
    }
    if (G) {
        F = F.replace(/<img[^>]+src="([^"]+)"[^>]*>/gi, "$1");
        var H = new RegExp("<(\\w+)[^>]*>", "gi");
        var E = new RegExp("<\\/\\w+>", "gi");
        F = F.replace(H, "");
        F = F.replace(E, "");
        var D = new RegExp("(&nbsp;)", "gi");
        F = F.replace(D, " ")
    } else {
        var A = new RegExp("\\[(\\w+)(=[^\\]]*)?\\]", "gi");
        var I = new RegExp("\\[\\/(\\w+)\\]", "gi");
        F = F.replace(A, "");
        F = F.replace(I, "")
    }
    return F
}
function truncate_to_word(D, A) {
    var C, B;
    C = D.split("");
    if (C.length > A) {
        for (B = C.length - 1; B > -1; --B) {
            if (B > A) {
                C.length = B
            } else {
                if (" " === C[B]) {
                    C.length = B;
                    break
                }
            }
        }
        C.push("...")
    }
    return C.join("")
}
function vB_PHP_Emulator() {}
vB_PHP_Emulator.prototype.stripos = function (A, B, C) {
    if (typeof C == "undefined") {
        C = 0
    }
    index = A.toLowerCase().indexOf(B.toLowerCase(), C);
    return (index == -1 ? false : index)
};
vB_PHP_Emulator.prototype.ltrim = function (A) {
    return A.replace(/^\s+/g, "")
};
vB_PHP_Emulator.prototype.rtrim = function (A) {
    return A.replace(/(\s+)$/g, "")
};
vB_PHP_Emulator.prototype.trim = function (A) {
    return this.ltrim(this.rtrim(A))
};
vB_PHP_Emulator.prototype.preg_quote = function (A) {
    return A.replace(/(\+|\{|\}|\(|\)|\[|\]|\||\/|\?|\^|\$|\\|\.|\=|\!|\<|\>|\:|\*)/g, "\\$1")
};
vB_PHP_Emulator.prototype.match_all = function (C, E) {
    var A = C.match(RegExp(E, "gim"));
    if (A) {
        var F = new Array();
        var B = new RegExp(E, "im");
        for (var D = 0; D < A.length; D++) {
            F[F.length] = A[D].match(B)
        }
        return F
    } else {
        return false
    }
};
vB_PHP_Emulator.prototype.unhtmlspecialchars = function (F, E) {
    var D = new Array(/&lt;/g, /&gt;/g, /&quot;/g, /&amp;/g);
    var C = new Array("<", ">", '"', "&");
    for (var B in D) {
        if (YAHOO.lang.hasOwnProperty(D, B)) {
            F = F.replace(D[B], C[B])
        }
    }
    if (E) {
        if (is_ie) {
            F = F.replace(/\n/g, "<#br#>")
        }
        var A = document.createElement("textarea");
        A.innerHTML = F;
        F = A.value;
        if (null != A.parentNode) {
            A.parentNode.removeChild(A)
        }
        if (is_ie) {
            F = F.replace(/<#br#>/g, "\n")
        }
        return F
    }
    return F
};
vB_PHP_Emulator.prototype.unescape_cdata = function (C) {
    var B = /<\=\!\=\[\=C\=D\=A\=T\=A\=\[/g;
    var A = /\]\=\]\=>/g;
    return C.replace(B, "<![CDATA[").replace(A, "]]>")
};
vB_PHP_Emulator.prototype.htmlspecialchars = function (D) {
    var C = new Array((is_mac && is_ie ? new RegExp("&", "g") : new RegExp("&(?!#[0-9]+;)", "g")), new RegExp("<", "g"), new RegExp(">", "g"), new RegExp('"', "g"));
    var B = new Array("&amp;", "&lt;", "&gt;", "&quot;");
    for (var A = 0; A < C.length; A++) {
        D = D.replace(C[A], B[A])
    }
    return D
};
vB_PHP_Emulator.prototype.in_array = function (D, C, B) {
    var E = new String(D);
    var A;
    if (B) {
        E = E.toLowerCase();
        for (A in C) {
            if (YAHOO.lang.hasOwnProperty(C, A)) {
                if (C[A].toLowerCase() == E) {
                    return A
                }
            }
        }
    } else {
        for (A in C) {
            if (YAHOO.lang.hasOwnProperty(C, A)) {
                if (C[A] == E) {
                    return A
                }
            }
        }
    }
    return -1
};
vB_PHP_Emulator.prototype.str_pad = function (C, A, B) {
    C = new String(C);
    B = new String(B);
    if (C.length < A) {
        padtext = new String(B);
        while (padtext.length < (A - C.length)) {
            padtext += B
        }
        C = padtext.substr(0, (A - C.length)) + C
    }
    return C
};
vB_PHP_Emulator.prototype.urlencode = function (D) {
    D = escape(D.toString()).replace(/\+/g, "%2B");
    var B = D.match(/(%([0-9A-F]{2}))/gi);
    if (B) {
        for (var C = 0; C < B.length; C++) {
            var A = B[C].substring(1, 3);
            if (parseInt(A, 16) >= 128) {
                D = D.replace(B[C], "%u00" + A)
            }
        }
    }
    D = D.replace("%25", "%u0025");
    return D
};
vB_PHP_Emulator.prototype.ucfirst = function (D, A) {
    if (typeof A != "undefined") {
        var B = D.indexOf(A);
        if (B > 0) {
            D = D.substr(0, B)
        }
    }
    D = D.split(" ");
    for (var C = 0; C < D.length; C++) {
        D[C] = D[C].substr(0, 1).toUpperCase() + D[C].substr(1)
    }
    return D.join(" ")
};

function vB_AJAX_Handler(A) {
    this.async = A ? true : false;
    this.conn = null
}
vB_AJAX_Handler.prototype.init = function () {
    return AJAX_Compatible
};
vB_AJAX_Handler.is_compatible = function () {
    return AJAX_Compatible
};
vB_AJAX_Handler.prototype.onreadystatechange = function (A) {
    this.callback = A
};
vB_AJAX_Handler.prototype.fetch_data = function (A) {
    console.warn('vB_AJAX_Handler.prototype.fetch_data() is deprecated.\nUse responseXML.getElementsByTagName("x")[i].firstChild.nodeValue instead.');
    if (A && A.firstChild && A.firstChild.nodeValue) {
        return PHP.unescape_cdata(A.firstChild.nodeValue)
    } else {
        return ""
    }
};
vB_AJAX_Handler.prototype.send = function (A, B) {
    this.conn = YAHOO.util.Connect.asyncRequest("POST", A, {
        success: this.callback
    }, B + "&securitytoken=" + SECURITYTOKEN + "&s=" + fetch_sessionhash());
    this.handler = this.conn.conn
};

function is_ajax_compatible() {
    if (typeof vb_disable_ajax != "undefined" && vb_disable_ajax == 2) {
        return false
    } else {
        if (is_ie && !is_ie4) {
            return true
        } else {
            if (window.XMLHttpRequest) {
                try {
                    var A = new XMLHttpRequest();
                    return A.setRequestHeader ? true : false
                } catch (B) {
                    return false
                }
            } else {
                return false
            }
        }
    }
}
AJAX_Compatible = is_ajax_compatible();
console.info("This browser is%s AJAX compatible", AJAX_Compatible ? "" : " NOT");

function vBulletin_AJAX_Error_Handler(A) {
    console.warn("AJAX Error: Status = %s: %s", A.status, A.statusText)
}
function vB_Hidden_Form(A) {
    this.action = A;
    this.variables = new Array()
}
vB_Hidden_Form.prototype.add_variable = function (A, B) {
    this.variables[this.variables.length] = new Array(A, B);
    console.log("vB_Hidden_Form :: add_variable(%s)", A)
};
vB_Hidden_Form.prototype.add_variables_from_object = function (F) {
    if (!F) {
        return
    }
    console.info("vB_Hidden_Form :: add_variables_from_object(%s)", F.id);
    var B = fetch_tags(F, "input");
    var E;
    for (E = 0; E < B.length; E++) {
        if (B[E].disabled) {
            continue
        }
        switch (B[E].type) {
        case "checkbox":
        case "radio":
            if (B[E].checked) {
                this.add_variable(B[E].name, B[E].value)
            }
            break;
        case "text":
        case "hidden":
        case "password":
            this.add_variable(B[E].name, B[E].value);
            break;
        default:
            continue
        }
    }
    var A = fetch_tags(F, "textarea");
    for (E = 0; E < A.length; E++) {
        if (A[E].disabled) {
            continue
        }
        this.add_variable(A[E].name, A[E].value)
    }
    var D = fetch_tags(F, "select");
    for (E = 0; E < D.length; E++) {
        if (D[E].disabled) {
            continue
        }
        if (D[E].multiple) {
            for (var C = 0; C < D[E].options.length; C++) {
                if (D[E].options[C].selected) {
                    this.add_variable(D[E].name, D[E].options[C].value)
                }
            }
        } else {
            if (D[E].selectedIndex > -1) {
                this.add_variable(D[E].name, D[E].options[D[E].selectedIndex].value)
            }
        }
    }
};
vB_Hidden_Form.prototype.fetch_variable = function (A) {
    for (var B = 0; B < this.variables.length; B++) {
        if (this.variables[B][0] == A) {
            return this.variables[B][1]
        }
    }
    return null
};
vB_Hidden_Form.prototype.submit_form = function () {
    this.form = document.createElement("form");
    this.form.method = "post";
    this.form.action = this.action;
    for (var A = 0; A < this.variables.length; A++) {
        var B = document.createElement("input");
        B.type = "hidden";
        B.name = this.variables[A][0];
        B.value = this.variables[A][1];
        this.form.appendChild(B)
    }
    console.info("vB_Hidden_Form :: submit_form() -> %s", this.action);
    document.body.appendChild(this.form).submit()
};
vB_Hidden_Form.prototype.build_query_string = function () {
    var B = "";
    for (var A = 0; A < this.variables.length; A++) {
        B += this.variables[A][0] + "=" + PHP.urlencode(this.variables[A][1]) + "&"
    }
    console.info("vB_Hidden_Form :: Query String = %s", B);
    return B
};
vB_Hidden_Form.prototype.add_input = vB_Hidden_Form.prototype.add_variable;
vB_Hidden_Form.prototype.add_inputs_from_object = vB_Hidden_Form.prototype.add_variables_from_object;

function vB_Select_Overlay_Handler(A) {
    this.browser_affected = (is_ie && YAHOO.env.ua.ie < 7);
    if (this.browser_affected) {
        this.overlay = YAHOO.util.Dom.get(A);
        this.hidden_selects = new Array();
        console.log("Initializing <select> overlay handler for '%s'.", this.overlay.id)
    }
}
vB_Select_Overlay_Handler.prototype.hide = function () {
    if (this.browser_affected) {
        var C = YAHOO.util.Dom.getRegion(this.overlay);
        var B = document.getElementsByTagName("select");
        for (var A = 0; A < B.length; A++) {
            if (region_intersects(B[A], C)) {
                if (YAHOO.util.Dom.isAncestor(this.overlay, B[A])) {
                    continue
                } else {
                    YAHOO.util.Dom.setStyle(B[A], "visibility", "hidden");
                    this.hidden_selects.push(YAHOO.util.Dom.generateId(B[A]))
                }
            }
        }
    }
};
vB_Select_Overlay_Handler.prototype.show = function () {
    if (this.browser_affected) {
        var A;
        while (A = this.hidden_selects.pop()) {
            YAHOO.util.Dom.setStyle(A, "visibility", "visible")
        }
    }
};

function openWindow(C, D, B, A) {
    if (!C.match(/^https?:\/\//)) {
        C = getBaseUrl() + C
    }
    return window.open(C, (typeof A == "undefined" ? "vBPopup" : A), "statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes" + (typeof D != "undefined" ? (",width=" + D) : "") + (typeof B != "undefined" ? (",height=" + B) : ""))
}
function getBaseUrl() {
    try {
        var A = document.getElementsByTagName("base");
        if (A.length == 0) {
            return ""
        }
        A = A[A.length - 1].href;
        if (!A) {
            return ""
        }
        return A.match(/.*[\/\\]/)
    } catch (B) {
        return ""
    }
}
function js_open_help(B, C, A) {
    return openWindow("help.php?s=" + SESSIONHASH + "&do=answer&page=" + B + "&pageaction=" + C + "&option=" + A, 600, 450, "helpwindow")
}
function attachments(A) {
    return openWindow("misc.php?" + SESSIONURL + "do=showattachments&t=" + A, 480, 300)
}
function who(A) {
    return openWindow("misc.php?" + SESSIONURL + "do=whoposted&t=" + A, 600, 300)
}
function imwindow(D, B, C, A) {
    return openWindow("sendmessage.php?" + SESSIONURL + "do=im&type=" + D + "&u=" + B, C, A)
}
function SendMSNMessage(A) {
    if (!is_ie) {
        alert(vbphrase.msn_functions_only_work_in_ie)
    } else {
        try {
            MsgrObj.InstantMessage(A)
        } catch (B) {
            alert(vbphrase.msn_functions_only_work_in_ie)
        }
    }
    return false
}
function AddMSNContact(A) {
    if (!is_ie) {
        alert(vbphrase.msn_functions_only_work_in_ie)
    } else {
        try {
            MsgrObj.AddContact(0, A)
        } catch (B) {
            alert(vbphrase.msn_functions_only_work_in_ie)
        }
    }
    return false
}
function detect_caps_lock(D) {
    D = (D ? D : window.event);
    var A = (D.which ? D.which : (D.keyCode ? D.keyCode : (D.charCode ? D.charCode : 0)));
    var C = (D.shiftKey || (D.modifiers && (D.modifiers & 4)));
    var B = (D.ctrlKey || (D.modifiers && (D.modifiers & 2)));
    return (A >= 65 && A <= 90 && !C && !B) || (A >= 97 && A <= 122 && C)
}
function log_out(B) {
    var A = document.getElementsByTagName("html")[0];
    A.style.filter = "progid:DXImageTransform.Microsoft.BasicImage(grayscale=1)";
    if (confirm(B)) {
        return true
    } else {
        A.style.filter = "";
        return false
    }
}
function set_cookie(B, C, A) {
    console.log("Set Cookie :: %s = '%s'", B, C);
    document.cookie = B + "=" + escape(C) + "; path=/" + (typeof A != "undefined" ? "; expires=" + A.toGMTString() : "")
}
function set_subcookie(B, J, I, D, H, A) {
    H = (typeof (H) == "undefined" ? ":" : H);
    A = (typeof (A) == "undefined" ? "#" : A);
    var C = fetch_cookie(B);
    if (C != null && C != "") {
        C = C.split(H);
        if (C.length > 0) {
            var G = "";
            for (var F = 0; F < C.length; F++) {
                var E = C[F].split(A);
                if (E[0] != J) {
                    G += (G != "" ? H : "");
                    G += E[0] + A + E[1]
                }
            }
        }
        G += (G != "" ? H : "");
        G += J + A + I
    } else {
        var G = J + A + I
    }
    console.log("Set Sub Cookie :: %s : '%s:%s'", B, J, I);
    set_cookie(B, G, D)
}
function fetch_subcookie(D, G, B, A) {
    B = (typeof (B) == "undefined" ? ":" : B);
    valuesep = (typeof (valuesep) == "undefined" ? "#" : valuesep);
    var F = fetch_cookie(D);
    if (F != null && F != "") {
        F = F.split(B);
        if (F.length > 0) {
            for (var E = 0; E < F.length; E++) {
                var C = F[E].split(valuesep);
                if (C[0] == G) {
                    return C[1]
                }
            }
        }
    }
    return null
}
function delete_cookie(A) {
    console.log("Delete Cookie :: %s", A);
    document.cookie = A + "=; expires=Thu, 01-Jan-70 00:00:01 GMT; path=/"
}
function fetch_cookie(A) {
    cookie_name = A + "=";
    cookie_length = document.cookie.length;
    cookie_begin = 0;
    while (cookie_begin < cookie_length) {
        value_begin = cookie_begin + cookie_name.length;
        if (document.cookie.substring(cookie_begin, value_begin) == cookie_name) {
            var C = document.cookie.indexOf(";", value_begin);
            if (C == -1) {
                C = cookie_length
            }
            var B = unescape(document.cookie.substring(value_begin, C));
            console.log("Fetch Cookie :: %s = '%s'", A, B);
            return B
        }
        cookie_begin = document.cookie.indexOf(" ", cookie_begin) + 1;
        if (cookie_begin == 0) {
            break
        }
    }
    console.log("Fetch Cookie :: %s (null)", A);
    return null
}
function js_toggle_all(D, E, C, A, G) {
    for (var B = 0; B < D.elements.length; B++) {
        var F = D.elements[B];
        if (F.type == E && PHP.in_array(F.name, A, false) == -1) {
            switch (E) {
            case "radio":
                if (F.value == C) {
                    F.checked = G
                }
                break;
            case "select-one":
                F.selectedIndex = G;
                break;
            default:
                F.checked = G;
                break
            }
        }
    }
}
function js_select_all(A) {
    exclude = new Array();
    exclude[0] = "selectall";
    js_toggle_all(A, "select-one", "", exclude, A.selectall.selectedIndex)
}
function js_check_all(A) {
    exclude = new Array();
    exclude[0] = "keepattachments";
    exclude[1] = "allbox";
    exclude[2] = "removeall";
    js_toggle_all(A, "checkbox", "", exclude, A.allbox.checked)
}
function js_check_all_option(B, A) {
    exclude = new Array();
    exclude[0] = "useusergroup";
    js_toggle_all(B, "radio", A, exclude, true)
}
function checkall(A) {
    js_check_all(A)
}
function checkall_option(B, A) {
    js_check_all_option(B, A)
}
function resize_textarea(E, D) {
    var B = fetch_object(D);
    var C = parseInt(B.offsetWidth) + (E < 0 ? -100 : 100);
    var A = parseInt(B.offsetHeight) + (E < 0 ? -100 : 100);
    if (C > 0) {
        B.style.width = parseInt(B.offsetWidth) + (E < 0 ? -100 : 100) + "px"
    }
    if (A > 0) {
        B.style.height = parseInt(B.offsetHeight) + (E < 0 ? -100 : 100) + "px"
    }
    return false
}
function region_intersects(B, A) {
    B = typeof (B.left) == "undefined" ? YAHOO.util.Dom.getRegion(B) : B;
    A = typeof (A.left) == "undefined" ? YAHOO.util.Dom.getRegion(A) : A;
    return (B.left > A.right || B.right < A.left || B.top > A.bottom || B.bottom < A.top) ? false : true
}
function fetch_viewport_info(A) {
    if (viewport_info == null || A) {
        viewport_info = {
            x: YAHOO.util.Dom.getDocumentScrollLeft(),
            y: YAHOO.util.Dom.getDocumentScrollTop(),
            w: YAHOO.util.Dom.getViewportWidth(),
            h: YAHOO.util.Dom.getViewportHeight(),
            dh: YAHOO.util.Dom.getDocumentHeight(),
            dw: YAHOO.util.Dom.getDocumentWidth()
        };
        console.info("Viewport Info: Size = %dx%d, Position = %d,%d, Document: Size = %dx%d", viewport_info.w, viewport_info.h, viewport_info.x, viewport_info.y, viewport_info.dw, viewport_info.dh)
    }
    return viewport_info
}
function clear_viewport_info() {
    viewport_info = null
}
function center_element(C, D, A, E) {
    viewport_info = fetch_viewport_info(D);
    var B = viewport_info.h / 2 + viewport_info.y - C.clientHeight / 2;
    if (E && B > E) {
        B = E
    }
    YAHOO.util.Dom.setXY(C, [viewport_info.w / 2 + viewport_info.x - C.clientWidth / 2, B]);
    if (document.documentElement.dir == "rtl") {
        if (A) {
            YAHOO.util.Dom.setStyle(C, "right", 0);
            YAHOO.util.Dom.setStyle(C, "left", null)
        }
    }
}
function fetch_all_stylesheets(D) {
    var G = new Array(),
        B = 0,
        A = null,
        E = 0,
        F = 0;
    for (B = 0; B < document.styleSheets.length; B++) {
        A = document.styleSheets[B];
        G.push(A);
        try {
            if (A.cssRules) {
                for (E = 0; E < A.cssRules.length; E++) {
                    if (A.cssRules[E].styleSheet) {
                        G.push(A.cssRules[E].styleSheet)
                    }
                }
            } else {
                if (A.imports) {
                    for (F = 0; F < A.imports.length; F++) {
                        G.push(A.imports[F])
                    }
                }
            }
        } catch (C) {
            G.pop();
            continue
        }
    }
    return G
}
function highlight_login_box() {
    var E = fetch_object("navbar_username");
    var A = "inlinemod";
    var B, C = 1600,
        D = 200;
    if (E) {
        E.focus();
        E.select();
        for (B = 0; B < C; B += 2 * D) {
            window.setTimeout(function () {
                YAHOO.util.Dom.addClass(E, A)
            }, B);
            window.setTimeout(function () {
                YAHOO.util.Dom.removeClass(E, A)
            }, B + D)
        }
    }
    return false
}
function toggle_collapse(A, B) {
    return false
}
function vBpagenav() {}
vBpagenav.prototype.controlobj_onclick = function (C) {
    this._onclick(C);
    var A = fetch_tags(this.menu.menuobj, "input");
    for (var B = 0; B < A.length; B++) {
        if (A[B].type == "text") {
            A[B].focus();
            break
        }
    }
};
vBpagenav.prototype.form_gotopage = function (A) {
    if ((pagenum = parseInt(fetch_object("pagenav_itxt").value, 10)) > 0) {
        window.location = vBmenu.menus[vBmenu.activemenu].addr + "&page=" + pagenum
    }
    return false
};
vBpagenav.prototype.ibtn_onclick = function (A) {
    return this.form.gotopage()
};
vBpagenav.prototype.itxt_onkeypress = function (A) {
    return ((A ? A : window.event).keyCode == 13 ? this.form.gotopage() : true)
};

function vbmenu_register(B, A, C) {
    if (typeof (vBmenu) == "object") {
        return vBmenu.register(B, A)
    } else {
        return false
    }
}
function string_to_node(B) {
    var A = document.createElement("div");
    A.innerHTML = B;
    var C = A.firstChild;
    while (C && C.nodeType != 1) {
        C = C.nextSibling
    }
    if (!C) {
        return A.firstChild.cloneNode(true)
    } else {
        return C.cloneNode(true)
    }
}
function set_unselectable(B) {
    B = YAHOO.util.Dom.get(B);
    if (!is_ie4 && typeof B.tagName != "undefined") {
        if (B.hasChildNodes()) {
            for (var A = 0; A < B.childNodes.length; A++) {
                set_unselectable(B.childNodes[A])
            }
        }
        B.unselectable = "on"
    }
}
function fetch_sessionhash() {
    return (SESSIONURL == "" ? "" : SESSIONURL.substr(2, 32))
}
function previousSibling(A) {
    do {
        p = A.previousSibling
    } while (p && p.nodeType != 1);
    return p
}
function nextSibling(A) {
    do {
        p = A.nextSibling
    } while (p && p.nodeType != 1);
    return p
}
function construct_phrase() {
    if (!arguments || arguments.length < 1 || !is_regexp) {
        return false
    }
    var A = arguments;
    var D = A[0];
    var C;
    for (var B = 1; B < A.length; B++) {
        C = new RegExp("%" + B + "\\$s", "gi");
        D = D.replace(C, A[B])
    }
    return D
}
function switch_id(C, E) {
    var F = C.options[C.selectedIndex].value;
    if (F == "") {
        return
    }
    var B = new String(window.location);
    var A = new String("");
    B = B.split("#");
    if (B[1]) {
        A = "#" + B[1]
    }
    B = B[0];
    if (B.indexOf(E + "id=") != -1 && is_regexp) {
        var D = new RegExp(E + "id=-?\\d+&?");
        B = B.replace(D, "")
    }
    if (B.indexOf("?") == -1) {
        B += "?"
    } else {
        lastchar = B.substr(B.length - 1);
        if (lastchar != "&" && lastchar != "?") {
            B += "&"
        }
    }
    window.location = B + E + "id=" + F + A
}
function child_img_alt_2_title(A) {
    var C = A.getElementsByTagName("img");
    for (var B = 0; B < C.length; B++) {
        img_alt_2_title(C[B])
    }
}
function img_alt_2_title(A) {
    if (!A.title && A.alt != "") {
        A.title = A.alt
    }
}
function do_securitytoken_replacement(B) {
    if (B == "") {
        return
    }
    for (var A = 0; A < document.forms.length; A++) {
        if (document.forms[A].elements.securitytoken && document.forms[A].elements.securitytoken.value == SECURITYTOKEN) {
            document.forms[A].elements.securitytoken.value = B
        }
    }
    SECURITYTOKEN = B;
    console.log("Securitytoken updated")
}
function handle_securitytoken_response(A) {
    console.log("Processing securitytoken update");
    if (A.responseXML && A.responseXML.getElementsByTagName("securitytoken").length) {
        var B = A.responseXML.getElementsByTagName("securitytoken")[0].firstChild.nodeValue;
        do_securitytoken_replacement(B);
        securitytoken_errors = 0
    } else {
        handle_securitytoken_error(A)
    }
}
function handle_securitytoken_error(A) {
    console.log("Securitytoken Error");
    if (++securitytoken_errors == 3) {
        do_securitytoken_replacement("guest")
    }
}
var securitytoken_timeout = window.setTimeout("replace_securitytoken()", 3600000);
var securitytoken_errors = 0;

function fetch_ajax_url(B) {
    if (typeof (AJAXBASEURL) == "undefined") {
        console.log("AJAXBASEURL is not defined");
        return B
    } else {
        if (!B.match(/^https?:\/\//)) {
            var C = new RegExp("^../", "gi");
            if (B.match(C)) {
                return AJAXBASEURL + B.replace(C, "")
            } else {
                return AJAXBASEURL + B
            }
        } else {
            if (BBURL) {
                PATHS.bburl = BBURL
            }
            for (var A in PATHS) {
                var C = new RegExp("^" + PHP.preg_quote(PATHS[A]) + "/", "gi");
                if (PATHS[A] != "" && B.match(C)) {
                    return AJAXBASEURL + B.replace(C, "")
                }
            }
            return B
        }
    }
}
function replace_securitytoken() {
    window.clearTimeout(securitytoken_timeout);
    if (AJAX_Compatible && SECURITYTOKEN != "" && SECURITYTOKEN != "guest") {
        securitytoken_timeout = window.setTimeout("replace_securitytoken()", 3600000);
        YAHOO.util.Connect.asyncRequest("POST", fetch_ajax_url("ajax.php"), {
            success: handle_securitytoken_response,
            failure: handle_securitytoken_error,
            timeout: vB_Default_Timeout
        }, SESSIONURL + "securitytoken=" + SECURITYTOKEN + "&do=securitytoken")
    }
}
function Comment_Init(B) {
    if (typeof B.id == "undefined") {
        return
    }
    var C = B.id;
    if (isNaN(C)) {
        var A = null;
        if (A = C.match(/(\d+)/)) {
            C = A[0]
        }
    }
    if (typeof inlineMod_comment != "undefined") {
        im_init(B, inlineMod_comment)
    }
    if (typeof vB_QuickEditor_Factory != "undefined") {
        if (typeof vB_QuickEditor_Factory.controls[C] == "undefined") {
            vB_QuickEditor_Factory.controls[C] = new vB_QuickEditor(C, vB_QuickEditor_Factory)
        } else {
            vB_QuickEditor_Factory.controls[C].init()
        }
    }
    if (typeof vB_QuickLoader_Factory != "undefined") {
        vB_QuickLoader_Factory.controls[C] = new vB_QuickLoader(C, vB_QuickLoader_Factory)
    }
    child_img_alt_2_title(B);
    if (typeof YAHOO.vBulletin.vBRestrain != "undefined") {
        YAHOO.vBulletin.vBRestrain.addcontainer(B);
        YAHOO.vBulletin.vBRestrain.resize(B)
    }
}
function vBulletin_init() {
    if (is_webtv) {
        return false
    }
    child_img_alt_2_title(document);
    if (typeof vBmenu == "object") {
        if (typeof (YAHOO) != "undefined") {
            YAHOO.util.Event.on(document, "click", vbmenu_hide);
            YAHOO.util.Event.on(window, "resize", vbmenu_hide)
        } else {
            if (window.attachEvent && !is_saf) {
                document.attachEvent("onclick", vbmenu_hide);
                window.attachEvent("onresize", vbmenu_hide)
            } else {
                if (document.addEventListener && !is_saf) {
                    document.addEventListener("click", vbmenu_hide, false);
                    window.addEventListener("resize", vbmenu_hide, false)
                } else {
                    window.onclick = vbmenu_hide;
                    window.onresize = vbmenu_hide
                }
            }
        }
        var B = fetch_tags(document, "td");
        for (var D = 0; D < B.length; D++) {
            if (B[D].hasChildNodes() && B[D].firstChild.name && B[D].firstChild.name.indexOf("PageNav") != -1) {
                var C = B[D].title;
                B[D].title = "";
                B[D].innerHTML = "";
                B[D].id = "pagenav." + D;
                var A = vBmenu.register(B[D].id);
                A.addr = C;
                if (is_saf) {
                    A.controlobj._onclick = A.controlobj.onclick;
                    A.controlobj.onclick = vBpagenav.prototype.controlobj_onclick
                }
            }
        }
        if (typeof C != "undefined") {
            fetch_object("pagenav_form").gotopage = vBpagenav.prototype.form_gotopage;
            fetch_object("pagenav_ibtn").onclick = vBpagenav.prototype.ibtn_onclick;
            fetch_object("pagenav_itxt").onkeypress = vBpagenav.prototype.itxt_onkeypress
        }
        vBmenu.activate(true)
    }
    vBulletin.init();
    return true
}
function vBulletin_Framework() {
    this.elements = new Array();
    this.ajaxurls = new Array();
    this.events = new Array();
    this.time = new Date();
    this.add_event("systemInit")
}
vBulletin_Framework.prototype.init = function () {
    console.info("Firing System Init");
    this.events.systemInit.fire()
};
vBulletin_Framework.prototype.extend = function (C, A) {
    function B() {}
    B.prototype = A.prototype;
    C.prototype = new B();
    C.prototype.constructor = C;
    C.baseConstructor = A;
    C.superClass = A.prototype
};
vBulletin_Framework.prototype.register_control = function (B, E) {
    var C = new Array();
    for (var D = 1; D < arguments.length; D++) {
        C.push(arguments[D])
    }
    if (!this.elements[B]) {
        console.info('Creating array vBulletin.elements["%s"]', B);
        this.elements[B] = new Array()
    }
    var A = this.elements[B].push(C);
    console.log('vBulletin.elements["%s"][%d] = %s', B, A - 1, C.join(", "))
};
vBulletin_Framework.prototype.register_ajax_urls = function (B, C, D) {
    B = B.split("?");
    B[1] = SESSIONURL + "securitytoken=" + SECURITYTOKEN + "&ajax=1&" + B[1].replace(/\{(\d+)(:\w+)?\}/gi, "%$1$s");
    C = C.split("?");
    C[1] = SESSIONURL + "securitytoken=" + SECURITYTOKEN + "&ajax=1&" + C[1].replace(/\{(\d+)(:\w+)?\}/gi, "%$1$s");
    console.log("Register AJAX URLs for %s", D);
    for (var A = 0; A < D.length; A++) {
        this.ajaxurls[D[A]] = new Array(B, C)
    }
};
vBulletin_Framework.prototype.add_event = function (A) {
    this.events[A] = new YAHOO.util.CustomEvent(A)
};
vBulletin_Framework.prototype.console = function () {
    if (window.console || console.firebug) {
        var args = new Array();
        for (var i = 0; i < arguments.length; i++) {
            args[args.length] = arguments[i]
        }
        try {
            eval("console.log('" + args.join("','") + "');")
        } catch (e) {}
    }
};
var PHP = new vB_PHP_Emulator();
var vBulletin = new vBulletin_Framework();
vBulletin.events.systemInit.subscribe(function () {
    YAHOO.util.Event.on(window, "resize", clear_viewport_info);
    YAHOO.util.Event.on(window, "scroll", clear_viewport_info)
});

function handle_dismiss_notice_error(C) {
    if (C.argument) {
        var B = YAHOO.util.Dom.get("dismiss_notice_hidden");
        B.value = C.argument;
        var A = YAHOO.util.Dom.get("notices");
        A.submit()
    }
}
function handle_dismiss_notice_ajax(G) {
    if (G.responseXML && G.responseXML.getElementsByTagName("dismissed").length) {
        var D = G.responseXML.getElementsByTagName("dismissed")[0].firstChild.nodeValue;
        var B = YAHOO.util.Dom.get("navbar_notice_" + D);
        if (B != null) {
            YAHOO.util.Dom.setStyle(B, "display", "none");
            var F = YAHOO.util.Dom.get("notices");
            var A = F.getElementsByTagName("li");
            var E = 0;
            if (A.length) {
                for (var C = 0; C < A.length; C++) {
                    if (YAHOO.util.Dom.getStyle(A[C], "display") != "none") {
                        E++
                    }
                }
                if (E == 0) {
                    YAHOO.util.Dom.setStyle("notices", "display", "none")
                }
            }
        }
    } else {
        handle_dismiss_notice_error(G)
    }
}
function dismiss_notice(B) {
    if (AJAX_Compatible) {
        var A = YAHOO.util.Connect.asyncRequest("POST", fetch_ajax_url("ajax.php?do=dismissnotice"), {
            success: handle_dismiss_notice_ajax,
            failure: handle_dismiss_notice_error,
            timeout: vB_Default_Timeout,
            argument: B
        }, SESSIONURL + "securitytoken=" + SECURITYTOKEN + "&do=dismissnotice&noticeid=" + PHP.urlencode(B));
        return false
    }
    return true
}
function page_jump(A) {
    window.location = A.options[A.selectedIndex].value
}
function loadVbCss(B) {
    if (!window.LESS_THAN_IE7) {
        var C = fetch_object("e_vb_meta_bburl");
        if (C) {
            if (!B.match(/^https?:\/\//)) {
                B = C.content + "/" + B
            }
            var A = document.createElement("link");
            A.setAttribute("rel", "stylesheet");
            A.setAttribute("href", B);
            A.setAttribute("media", "screen");
            A.setAttribute("type", "text/css");
            A.setAttribute("charset", "utf-8");
            var D = document.getElementsByTagName("head");
            D = D[0] ? D[0] : null;
            if (D) {
                D.appendChild(A)
            }
        }
    }
}
YAHOO.namespace("vBulletin");
YAHOO.vBulletin.vB_XHTML_Ready = false;
var vB_XHTML_Ready = new YAHOO.util.CustomEvent();
YAHOO.util.Event.onAvailable("footer", function () {
    console.log("Fire vB_XHTML_Ready");
    vB_XHTML_Ready.fire();
    YAHOO.vBulletin.vB_XHTML_Ready = true
});
vB_XHTML_Ready.subscribe(init_breadcrumb);

function init_breadcrumb(D) {
    var C = YAHOO.util.Dom.get("breadcrumb");
    var B = C.getElementsByTagName("li");
    for (var A = 0; A < B.length; A++) {}
}
function register_inlinemod(D, F, C, B, E, A) {
    YAHOO.namespace("vBulletin.imodcollection." + B);
    YAHOO.vBulletin.imodcollection[B] = new InlineModCollection(B, B + "_imodsel", A);
    YAHOO.vBulletin.imodcollection[B].add_controls(YAHOO.util.Dom.getElementsByClassName(C, F, D), E)
}
function register_inlinemod_checkboxes(E, H, D, A, C, G, B) {
    var F = new InlineModCollection(C, null, B);
    F.add_controls(YAHOO.util.Dom.getElementsByClassName(D, H, E), G);
    F.add_checkboxes(A)
}
YAHOO.namespace("vBulletin.imodcollections");

function InlineModCollection(B, A, C) {
    this.type = B;
    this.collection = new Array();
    if (typeof C == "undefined") {
        C = "vbulletin_inline"
    }
    this.cookiename = C + this.type;
    this.selecteditems = this.fetch_ids();
    this.set_display_count(this.selecteditems.length);
    this.init_selector(A);
    YAHOO.vBulletin.imodcollections[B] = this
}
InlineModCollection.get = function (A) {
    return YAHOO.vBulletin.imodcollections[A]
};
InlineModCollection.prototype.add_controls = function (D, E) {
    if (typeof E == "undefined") {
        E = this.type + "_"
    }
    for (var B = 0; B < D.length; B++) {
        var A = D[B];
        var C = A.id.substr(E.length);
        this.add_control(new InlineModControl(A, C, this))
    }
};
InlineModCollection.prototype.add_checkboxes = function (B) {
    var A = YAHOO.util.Dom.getElementsByClassName(this.type + "_checkall", "input", B);
    for (var D = 0; D < A.length; D++) {
        var C = A[D];
        if (C.type == "checkbox") {
            YAHOO.util.Event.on(C, "click", this.set_from_checkbox, this, true)
        }
    }
};
InlineModCollection.prototype.add_control = function (A) {
    if (PHP.in_array(A.itemid, this.selecteditems) != -1) {
        A.checkbox.checked = true;
        A.set_inlinemod_highlight()
    }
    this.collection.push(A)
};
InlineModCollection.prototype.init_selector = function (A) {
    var D = YAHOO.util.Dom.get(A);
    if (D != null) {
        var B = D.getElementsByTagName("a");
        for (var C = 0; C < B.length; C++) {
            if (B[C].id && B[C].id.substr(0, D.id.length) == D.id) {
                YAHOO.util.Event.on(B[C], "click", this.set_all_selections, this, true)
            }
        }
    }
};
InlineModCollection.prototype.set_from_checkbox = function (C) {
    var B = YAHOO.util.Event.getTarget(C);
    for (var A = 0; A < this.collection.length; A++) {
        this.collection[A].set_selection_from_checkbox(B)
    }
    this.update_collection_state()
};
InlineModCollection.prototype.set_all_selections = function (D) {
    var B = YAHOO.util.Event.getTarget(D);
    if ("a" != B.tagName.toLowerCase()) {
        B = YAHOO.util.Dom.getAncestorByTagName(B, "A")
    }
    console.log("Do:%s, ID:%s", B.innerHTML, B.id);
    var C = B.id.split(":");
    for (var A = 0; A < this.collection.length; A++) {
        this.collection[A].set_selection(C)
    }
    this.update_collection_state();
    YAHOO.util.Event.stopEvent(D);
    YAHOO.vBulletin.vBPopupMenu.close_all()
};
InlineModCollection.prototype.update_collection_state = function () {
    var B = new Array();
    for (var A = 0; A < this.collection.length; A++) {
        B.push(this.collection[A].itemid)
    }
    if (B.length) {
        this.selecteditems = this.remove_items(this.selecteditems, B)
    }
    for (var A = 0; A < this.collection.length; A++) {
        if (this.collection[A].checkbox.checked) {
            this.selecteditems.push(this.collection[A].itemid)
        }
    }
    this.set_cookie(this.selecteditems);
    this.set_display_count(this.selecteditems.length)
};
InlineModCollection.prototype.update_state = function (B, A) {
    this.selecteditems = this.remove_items(this.selecteditems, new Array(B));
    if (A) {
        this.selecteditems.push(B)
    }
    this.set_cookie(this.selecteditems);
    this.set_display_count(this.selecteditems.length)
};
InlineModCollection.prototype.remove_items = function (D, C) {
    var B = new Array();
    for (var A = 0; A < D.length; A++) {
        if (D[A] != "" && PHP.in_array(D[A], C) == -1) {
            B.push(D[A])
        }
    }
    return B
};
InlineModCollection.prototype.set_cookie = function (B) {
    var A = new Date();
    A.setTime(A.getTime() + 3600000);
    set_cookie(this.cookiename, B.join("-"), A)
};
InlineModCollection.prototype.fetch_ids = function () {
    var A = fetch_cookie(this.cookiename);
    if (A != null && A != "") {
        A = A.split("-");
        if (A.length > 0) {
            return A
        }
    }
    return new Array()
};
InlineModCollection.prototype.set_display_count = function (A) {
    var B = YAHOO.util.Dom.get(this.type + "_inlinemod_count");
    if (B) {
        B.innerHTML = A
    }
};

function InlineModControl(A, B, D) {
    var C = D.type + "_imod_checkbox_" + B;
    this.container = YAHOO.util.Dom.get(A);
    this.checkbox = YAHOO.util.Dom.get(C);
    this.itemid = B;
    this.collection = D;
    if (this.checkbox) {
        YAHOO.util.Event.on(this.checkbox, "click", this.set_inlinemod_state, this, true)
    } else {
        console.warn("No inlinemod selection checkbox found for " + C)
    }
}
InlineModControl.prototype.init_collection = function (A) {
    if (typeof YAHOO.vBulletin.imodcollection == "undefined") {
        YAHOO.vBulletin.imodcollection = new InlineModCollection(A)
    }
    return YAHOO.vBulletin.imodcollection
};
InlineModControl.prototype.set_selection_from_checkbox = function (A) {
    if (A.value != "all") {
        if (A.value != this.checkbox.value) {
            return
        }
    }
    this.checkbox.checked = A.checked;
    this.set_inlinemod_highlight()
};
InlineModControl.prototype.set_selection = function (A) {
    switch (A[1]) {
    case "invert":
        this.checkbox.checked = !this.checkbox.checked;
        break;
    case "none":
        this.checkbox.checked = false;
        break;
    case "class":
        this.checkbox.checked = YAHOO.util.Dom.hasClass(this.container, A[2]);
        break;
    case "flag":
        if (typeof A[2] != undefined && !isNaN(A[2])) {
            this.checkbox.checked = this.checkbox.value & A[2]
        } else {
            this.checkbox.checked = true
        }
        break;
    default:
    case "all":
        this.checkbox.checked = true;
        break
    }
    this.set_inlinemod_highlight()
};
InlineModControl.prototype.set_inlinemod_state = function () {
    this.collection.update_state(this.itemid, this.checkbox.checked);
    this.set_inlinemod_highlight()
};
InlineModControl.prototype.set_inlinemod_highlight = function () {
    var A = (this.checkbox.checked ? "addClass" : "removeClass");
    YAHOO.util.Dom[A](this.container, "imod_highlight");
    console.log("Set Inlinemod State for %s - %s", this.itemid, A)
};
vB_XHTML_Ready.subscribe(init_searchboxes);

function init_searchboxes() {
    var B = YAHOO.util.Dom.getElementsByClassName("searchbox", "input");
    for (var A = 0; A < B.length; A++) {
        new YAHOO.vBulletin.SearchBox(B[A])
    }
}
YAHOO.vBulletin.LoadScript = function (B, C) {
    var A = document.createElement("script");
    YAHOO.util.Dom.setAttribute(A, "type", "text/javascript");
    if (typeof (C) != "undefined") {
        if (A.readyState) {
            A.onreadystatechange = function () {
                if (A.readyState == "loaded" || A.readyState == "complete") {
                    A.onreadystatechange = null;
                    C()
                }
            }
        } else {
            A.onload = function () {
                C()
            }
        }
    }
    YAHOO.util.Dom.setAttribute(A, "src", B + "?" + Math.floor(Math.random() * 100000));
    document.getElementsByTagName("head")[0].appendChild(A)
};
YAHOO.vBulletin.LoadCss = function (A) {
    var B = document.createElement("link");
    YAHOO.util.Dom.setAttribute(B, "type", "text/css");
    YAHOO.util.Dom.setAttribute(B, "rel", "stylesheet");
    YAHOO.util.Dom.setAttribute(B, "href", A);
    document.getElementsByTagName("head")[0].appendChild(B)
};
YAHOO.vBulletin.SearchBox = function (A) {
    this.element = A;
    this.default_value = this.element.value;
    YAHOO.util.Event.on(this.element, "focus", this.focus_handler, this, true);
    YAHOO.util.Event.on(this.element, "blur", this.blur_handler, this, true)
};
YAHOO.vBulletin.SearchBox.prototype.focus_handler = function (A) {
    if (this.element.value == this.default_value) {
        this.element.value = ""
    }
    this.element.select()
};
YAHOO.vBulletin.SearchBox.prototype.blur_handler = function (A) {
    if (this.element.value == "") {
        this.element.value = this.default_value
    }
};
vB_XHTML_Ready.subscribe(init_popupmenus);

function init_popupmenus(A) {
    YAHOO.vBulletin.vBPopupMenu = new PopupFactory(A)
}
function PopupFactory(A) {
    this.menu_open = false;
    this.timeout = null;
    this.resize_timer = null;
    this.menuclose_timeout = null;
    this.popups = new Object();
    this.instrument(A);
    YAHOO.util.Event.on(document, "click", this.close_all, this, true);
    YAHOO.util.Event.on(window, "resize", this.set_timer)
}
PopupFactory.prototype.instrument = function (C) {
    var B = YAHOO.util.Dom.getElementsByClassName("popupmenu", undefined, C);
    for (var A = 0; A < B.length; A++) {
        if (!YAHOO.util.Dom.hasClass(B[A], "popupcustom")) {
            this.register(B[A])
        }
    }
};
PopupFactory.prototype.register = function (A) {
    var B = YAHOO.util.Dom.generateId(A);
    this.popups[B] = new PopupMenu(A, this)
};
PopupFactory.prototype.register_menuobj = function (A) {
    var B = YAHOO.util.Dom.generateId(A.container);
    this.popups[B] = A
};
PopupFactory.prototype.close_all = function (B) {
    if (this.menu_open) {
        for (var A in this.popups) {
            this.popups[A].close_menu()
        }
        this.menu_open = false
    }
};
PopupFactory.prototype.set_timer = function () {
    clearTimeout(this.resize_timer);
    resize_timer = window.setTimeout(function () {
        YAHOO.vBulletin.vBPopupMenu.resize_all()
    }, 200)
};
PopupFactory.prototype.resize_all = function (B) {
    if (this.menu_open) {
        for (var A in this.popups) {
            this.popups[A].set_offset(this.popups[A].menu, this.popups[A].ctrl)
        }
    }
};

function PopupMenu(A, B) {
    this.init(A, B)
}
PopupMenu.prototype.init = function (A, B) {
    this.container = A;
    this.factory = B;
    this.display = false;
    this.menu = null;
    this.ctrl = null;
    this.activate_menu();
    this.control = null;
    this.activate_control();
    this.locator = null;
    this.form = null;
    this.popup_form_elements = new Array();
    this.textdirection = document.documentElement.dir == "rtl" ? "right" : "left"
};
PopupMenu.prototype.activate_menu = function () {
    var A = YAHOO.util.Dom.getElementsByClassName("popupbody", "*", this.container);
    if (A.length) {
        this.menu = A[0];
        YAHOO.util.Dom.generateId(this.menu);
        if (YAHOO.util.Dom.hasClass(this.container, "hovermenu")) {
            YAHOO.util.Event.on(this.menu, "mouseover", this.cancel_menutimer, this, true);
            YAHOO.util.Event.on(this.menu, "mouseout", this.start_menutimer, this, true)
        }
    } else {}
    YAHOO.util.Dom.removeClass(A[0], "popuphover");
    YAHOO.util.Event.on(A[0], "click", this.cancel_close, this, true)
};
PopupMenu.prototype.activate_control = function () {
    var A = YAHOO.util.Dom.getElementsByClassName("popupctrl", "", this.container);
    if (A.length) {
        this.control = A[0];
        YAHOO.util.Dom.generateId(this.control);
        if (!YAHOO.util.Dom.hasClass(this.container, "noclick")) {
            YAHOO.util.Event.on(this.control, "click", this.toggle_menu, this, true)
        }
        if (YAHOO.util.Dom.hasClass(this.container, "hovermenu")) {
            YAHOO.util.Event.on(this.control, "mouseover", this.open_hovermenu, this, true);
            YAHOO.util.Event.on(this.control, "mouseout", this.start_menutimer, this, true)
        } else {
            if (!YAHOO.util.Dom.hasClass(this.container, "nomouseover")) {
                YAHOO.util.Event.on(this.control, "mouseover", this.mouseover, this, true);
                YAHOO.util.Event.on(this.control, "mouseout", this.mouseout, this, true)
            }
        }
    }
};
PopupMenu.prototype.cancel_close = function (A) {
    YAHOO.util.Event.stopPropagation(A)
};
PopupMenu.prototype.mouseover = function (A) {
    if (this.factory.menu_open) {
        this.open_menu(A)
    }
};
PopupMenu.prototype.mouseout = function (A) {
    if (this.factory.timeout != null) {
        this.factory.timeout.cancel()
    }
};
PopupMenu.prototype.open_hovermenu = function (A) {
    this.cancel_menutimer(A);
    this.open_menu(A)
};
PopupMenu.prototype.start_menutimer = function (A) {
    this.factory.menuclose_timeout = YAHOO.lang.later(300, this, "close_menu", [{
        e: A
    }])
};
PopupMenu.prototype.cancel_menutimer = function (A) {
    if (this.factory.menuclose_timeout != null) {
        this.factory.menuclose_timeout.cancel()
    }
};
PopupMenu.prototype.toggle_menu = function (A) {
    if (this.display) {
        this.close_menu()
    } else {
        this.open_menu(A)
    }
    YAHOO.util.Event.stopEvent(A)
};
PopupMenu.prototype.load_menu = function (B) {
    var C = {};
    for (var A in B) {
        C[A] = B[A]
    }
    YAHOO.util.Connect.asyncRequest("POST", fetch_ajax_url("load-popup.php?id=" + this.container.id), {
        success: this.handle_menu_load,
        failure: null,
        timeout: null,
        scope: this,
        argument: {
            e: C
        }
    }, "id=" + this.container.id)
};
PopupMenu.prototype.handle_menu_load = function (A) {
    alert("Load menu!")
};
PopupMenu.prototype.open_menu = function (B) {
    if (YAHOO.lang.isNull(this.menu)) {
        this.load_menu(B);
        return
    }
    if (this.factory.timeout != null) {
        this.factory.timeout.cancel()
    }
    this.factory.close_all();
    if (typeof (B) == "object") {
        var A = YAHOO.util.Event.getTarget(B)
    } else {
        var A = YAHOO.util.Dom.get(B)
    }
    if (A != null) {
        A = (YAHOO.util.Dom.hasClass(A, "popupctrl") ? A : YAHOO.util.Dom.getAncestorByClassName(A, "popupctrl"));
        this.ctrl = A
    }
    this.set_display(true, A);
    this.factory.menu_open = true
};
PopupMenu.prototype.close_menu = function () {
    this.set_display(false);
    this.factory.menu_open = false
};
PopupMenu.prototype.set_display = function (C, A) {
    if (YAHOO.lang.isNull(this.menu)) {
        return
    }
    var B = (typeof (A) != "undefined" && YAHOO.util.Dom.hasClass(A.parentNode, "editormenu"));
    this.display = C;
    if (C) {
        if (this.check_menu(this.menu)) {
            YAHOO.util.Dom.setStyle(this.menu, "display", "block");
            YAHOO.util.Dom.removeClass(this.menu, "hidden");
            this.set_offset(this.menu, A);
            this.set_control_style()
        }
    } else {
        YAHOO.util.Dom.setStyle(this.menu, "display", "none");
        this.set_control_style()
    }
};
PopupMenu.prototype.check_menu = function (C) {
    if (!YAHOO.util.Dom.hasClass(C, "noempty")) {
        return true
    }
    var A = this.menu.getElementsByTagName("li");
    if (A.length) {
        for (var B = 0; B < A.length; B++) {
            if (!YAHOO.util.Dom.hasClass(A[B], "noempty")) {
                return true
            }
        }
    }
    return false
};
PopupMenu.prototype.register_popup_form = function (A) {
    var B = this.contains_form_elements(A);
    if (B) {
        this.form = B.form
    }
};
PopupMenu.prototype.contains_form_elements = function (A) {
    var B = null;
    B = A.getElementsByTagName("input");
    if (B.length) {
        return B[0]
    } else {
        B = A.getElementsByTagName("textarea");
        if (B.length) {
            return B[0]
        } else {
            B = A.getElementsByTagName("select");
            if (B.length) {
                return B[0]
            }
        }
    }
    return false
};
PopupMenu.prototype.handle_popup_form_submit = function (D) {
    YAHOO.util.Event.stopEvent(D);
    var C = YAHOO.util.Event.getTarget(D);
    for (var B = 0; B < C.elements.length; B++) {
        var A = C.elements[B];
        if (A.name) {
            switch (A.tagName) {
            case "textarea":
            case "select":
                this.replicate_form_value(A);
                break;
            case "input":
            default:
                switch (A.type) {
                case "hidden":
                case "text":
                case "password":
                    this.replicate_form_value(A);
                    break;
                case "checkbox":
                case "radio":
                    if (A.checked) {
                        this.replicate_form_value(A)
                    }
                    break
                }
            }
        }
    }
    this.form.submit()
};
PopupMenu.prototype.replicate_form_value = function (B) {
    if (!this.form.elements[B.name]) {
        var A = document.createElement("input");
        A.name = B.name;
        A.type = "hidden";
        A.value = B.value;
        this.form.appendChild(A)
    } else {
        this.form.elements[B.name].value = B.value
    }
};
PopupMenu.prototype.handle_popup_form_reset = function (A) {
    YAHOO.util.Event.getTarget(A).reset();
    this.form.reset()
};
PopupMenu.prototype.set_offset = function (H, E) {
    if (!E) {
        return
    }
    var C = YAHOO.util.Dom.getX(E);
    var A = YAHOO.util.Dom.getY(E);
    var D = E.offsetWidth;
    var G = E.offsetHeight;
    if (this.textdirection == "left") {
        YAHOO.util.Dom.setX(H, C)
    } else {
        YAHOO.util.Dom.setStyle(H, "right", "auto");
        YAHOO.util.Dom.setX(H, C + D - (H.offsetWidth))
    }
    YAHOO.util.Dom.setY(H, A + G);
    var B = YAHOO.util.Dom.getClientRegion();
    var F = YAHOO.util.Dom.getRegion(H);
    if (F.right > B.right) {
        YAHOO.util.Dom.setX(H, B.right - (H.offsetWidth + 6));
        F = YAHOO.util.Dom.getRegion(H)
    }
    if (F.left < B.left) {
        YAHOO.util.Dom.setX(H, B.left);
        F = YAHOO.util.Dom.getRegion(H)
    }
    if (F.bottom > B.bottom) {
        YAHOO.util.Dom.setY(H, A - H.offsetHeight);
        F = YAHOO.util.Dom.getRegion(H)
    }
    if (F.top < B.top) {
        YAHOO.util.Dom.setY(H, B.top)
    }
};
PopupMenu.prototype.set_control_style = function () {
    var A = (this.display ? "addClass" : "removeClass");
    YAHOO.util.Dom[A](this.control, "active")
};
vB_XHTML_Ready.subscribe(init_collapsers);

function init_collapsers() {
    new vBCollapseFactory()
}
function vBCollapseFactory(A) {
    var B = YAHOO.util.Dom.getElementsByClassName("collapse", "a", A);
    for (var C = 0; C < B.length; C++) {
        new vBCollapse(B[C], this)
    }
    apply_collapses()
}
function vBCollapse(B, A) {
    this.init(B, A)
}
vBCollapse.prototype.init = function (B, A) {
    this.link = B;
    this.factory = A;
    this.targetid = null;
    this.target = null;
    this.image = null;
    var D = this.link.id.match(/^collapse_(.*)$/);
    this.targetid = D[1];
    this.target = YAHOO.util.Dom.get(this.targetid);
    var C = this.link.getElementsByTagName("img");
    this.image = C[0];
    if (this.target) {
        this.target.vBCollapseInstance = this;
        YAHOO.util.Event.on(this.link, "click", this.toggle_collapse, this, true)
    } else {
        if (this.targetid.substr(0, 5) == "c_cat") {
            YAHOO.util.Dom.setStyle(this.link, "display", "none")
        } else {
            console.error("Unable to enable collapse button: #collapse_" + this.targetid + ". Element to collapse is missing: #" + this.targetid)
        }
    }
};
vBCollapse.prototype.collapse = function () {
    YAHOO.util.Dom.setStyle(this.target, "display", "none");
    this.save_collapsed(true);
    if (this.image && !this.image.src.match(/_collapsed.png$/)) {
        var A = new RegExp("\\.png$");
        this.image.src = this.image.src.replace(A, "_collapsed.png")
    }
};
vBCollapse.prototype.expand = function () {
    YAHOO.util.Dom.setStyle(this.target, "display", "");
    this.save_collapsed(false);
    if (this.image) {
        var A = new RegExp("_collapsed\\.png$");
        this.image.src = this.image.src.replace(A, ".png")
    }
};
vBCollapse.prototype.toggle_collapse = function (A) {
    YAHOO.util.Event.stopEvent(A);
    if (!is_regexp) {
        return false
    }
    if (YAHOO.util.Dom.getStyle(this.target, "display") == "none") {
        this.expand()
    } else {
        this.collapse()
    }
    return false
};
vBCollapse.prototype.save_collapsed = function (D) {
    var C = fetch_cookie("vbulletin_collapse");
    var B = new Array();
    if (C != null) {
        C = C.split("\n");
        for (var A in C) {
            if (YAHOO.lang.hasOwnProperty(C, A) && C[A] != this.targetid && C[A] != "") {
                B[B.length] = C[A]
            }
        }
    }
    if (D) {
        B[B.length] = this.targetid
    }
    expires = new Date();
    expires.setTime(expires.getTime() + (1000 * 86400 * 365));
    set_cookie("vbulletin_collapse", B.join("\n"), expires)
};

function apply_collapses() {
    var B = fetch_cookie("vbulletin_collapse");
    if (B != null) {
        B = B.split("\n");
        for (var C in B) {
            var A = YAHOO.util.Dom.get(B[C]);
            if (A) {
                A.vBCollapseInstance.collapse()
            }
        }
    }
}
function PostBit_Init(A, C) {
    console.log("PostBit Init: %d", C);
    YAHOO.vBulletin.vBPopupMenu.instrument(A);
    if (typeof vB_QuickEditor != "undefined") {
        vB_AJAX_QuickEdit_Init(A)
    }
    if (typeof vB_QuickReply != "undefined") {
        qr_init_buttons(A)
    }
    if (typeof YAHOO.vBulletin.imodcollection != "undefined" && typeof YAHOO.vBulletin.imodcollection.post != "undefined") {
        var B = YAHOO.vBulletin.imodcollection.post;
        B.add_control(new InlineModControl(A, C, B))
    }
    if (typeof mq_init != "undefined") {
        mq_init(A)
    }
    if (typeof init_reputation_popupmenus != "undefined") {
        init_reputation_popupmenus(A)
    }
    if (typeof vB_Lightbox != "undefined") {
        init_postbit_lightbox(A, false, true)
    }
    child_img_alt_2_title(A);
    if (typeof YAHOO.vBulletin.vBRestrain != "undefined") {
        YAHOO.vBulletin.vBRestrain.addcontainer(A);
        YAHOO.vBulletin.vBRestrain.resize(A)
    }
}
YAHOO.util.Event.onDOMReady(init_restrain);

function init_restrain() {
    YAHOO.vBulletin.vBRestrain = new vBRestrain()
}
function vBRestrain() {
    this.containers = {};
    this.length = 0;
    var B = YAHOO.util.Dom.getElementsByClassName("postcontainer", "div");
    for (var A = 0; A < B.length; A++) {
        this.addcontainer(B[A]);
        this.length++
    }
    var B = YAHOO.util.Dom.getElementsByClassName("postcontainer", "li");
    for (var A = 0; A < B.length; A++) {
        this.addcontainer(B[A]);
        this.length++
    }
    var B = YAHOO.util.Dom.getElementsByClassName("postcontainer", "p");
    for (var A = 0; A < B.length; A++) {
        this.addcontainer(B[A]);
        this.length++
    }
    var B = YAHOO.util.Dom.getElementsByClassName("postcontainer", "blockquote");
    for (var A = 0; A < B.length; A++) {
        this.addcontainer(B[A]);
        this.length++
    }
    if (this.length > 0) {
        this.resizeall();
        YAHOO.util.Event.on(window, "resize", this.resizeall, this, true)
    }
}
vBRestrain.prototype.addcontainer = function (A) {
    if (YAHOO.util.Dom.hasClass(A, "postcontainer") || YAHOO.util.Dom.hasClass(A, "bbcode_container")) {
        if (!A.id) {
            YAHOO.util.Dom.generateId(A)
        }
        var C = A.id;
        this.containers[C] = {};
        this.containers[C].object = A;
        this.containers[C].objects = {};
        this.additem(A, "object");
        this.additem(A, "iframe")
    } else {
        var B = YAHOO.util.Dom.getAncestorByClassName(A, "postcontainer");
        if (B) {
            this.addcontainer(B)
        }
    }
};
vBRestrain.prototype.additem = function (B, A) {
    var G = B.id;
    var F = YAHOO.util.Dom.getElementsByClassName("restrain", A, B);
    for (var E = 0; E < F.length; E++) {
        if (YAHOO.util.Dom.hasClass(B, "postcontainer")) {
            var D = YAHOO.util.Dom.getAncestorByClassName(F[E], "bbcode_container");
            if (D) {
                this.addcontainer(D);
                continue
            }
        }
        if (!F[E].id) {
            YAHOO.util.Dom.generateId(F[E])
        }
        var C = F[E].id;
        this.containers[G].objects[C] = F[E]
    }
};
vBRestrain.prototype.resize = function (E) {
    if (E.id && this.containers[E.id]) {
        var B = this.containers[E.id];
        var F = document.getElementsByTagName("html")[0].getAttribute("dir").toLowerCase();
        if (!B.object) {
            return
        }
        B.paddingLeft = parseFloat(YAHOO.util.Dom.getStyle(B.object, "paddingLeft"));
        B.paddingRight = parseFloat(YAHOO.util.Dom.getStyle(B.object, "paddingRight"));
        B.borderLeftWidth = parseFloat(YAHOO.util.Dom.getStyle(B.object, "borderLeftWidth"));
        B.borderRightWidth = parseFloat(YAHOO.util.Dom.getStyle(B.object, "borderRightWidth"));
        var D = YAHOO.util.Dom.getRegion(B.object);
        B.width = D.width - (isNaN(B.paddingLeft) ? 0 : B.paddingLeft) - (isNaN(B.paddingRight) ? 0 : B.paddingRight) - (isNaN(B.borderLeftWidth) ? 0 : B.borderLeftWidth) - (isNaN(B.borderRightWidth) ? 0 : B.borderRightWidth);
        if (F == "ltr") {
            if (isNaN(B.paddingRight) || B.paddingRight < 5) {
                B.paddingRight = 5
            }
            B.right = D.right - (isNaN(B.paddingRight) ? 0 : B.paddingRight) - (isNaN(B.borderRightWidth) ? 0 : B.borderRightWidth)
        } else {
            if (isNaN(B.paddingLeft) || B.paddingLeft < 5) {
                B.paddingLeft = 5
            }
            B.left = D.left + (isNaN(B.paddingLeft) ? 0 : B.paddingLeft) + (isNaN(B.borderLeftWidth) ? 0 : B.borderLeftWidth)
        }
        if (B.width <= 0) {
            return
        }
        for (var H in B.objects) {
            if (!B.objects[H]) {
                continue
            }
            var C = B.objects[H];
            var D = YAHOO.util.Dom.getRegion(C);
            if (D.width == 0) {
                D.width = parseInt(YAHOO.util.Dom.getStyle(C, "width"), 10);
                D.height = parseInt(YAHOO.util.Dom.getStyle(C, "height"), 10);
                if (D.width == 0) {
                    return
                }
                if (F == "ltr") {
                    D.right += D.width
                } else {
                    D.left -= D.width
                }
            }
            if (!C.origwidth) {
                C.origwidth = D.width;
                C.origheight = D.height;
                C.aspect = D.width / D.height
            }
            if (F == "ltr") {
                if (D.right > B.right) {
                    var A = D.width - (D.right - B.right) - 10;
                    if (A <= 0) {
                        return
                    }
                    YAHOO.util.Dom.setStyle(C, "width", A + "px");
                    YAHOO.util.Dom.setStyle(C, "height", Math.round(A / C.aspect) + "px")
                } else {
                    if (D.width < C.origwidth) {
                        var G = (B.right - D.right) - 10;
                        if (D.width + G >= C.origwidth) {
                            YAHOO.util.Dom.setStyle(C, "width", C.origwidth + "px");
                            YAHOO.util.Dom.setStyle(C, "height", C.origheight + "px")
                        } else {
                            var A = D.width + G;
                            if (A <= 0) {
                                return
                            }
                            YAHOO.util.Dom.setStyle(C, "width", A + "px");
                            YAHOO.util.Dom.setStyle(C, "height", Math.round(A / C.aspect) + "px")
                        }
                    }
                }
            } else {
                if (D.left < B.left) {
                    var A = D.width - (B.left - D.left) - 10;
                    if (A <= 0) {
                        return
                    }
                    YAHOO.util.Dom.setStyle(C, "width", A + "px");
                    YAHOO.util.Dom.setStyle(C, "height", Math.round(A / C.aspect) + "px")
                } else {
                    if (D.width < C.origwidth) {
                        var G = (D.left - B.left) - 10;
                        if (D.width + G >= C.origwidth) {
                            YAHOO.util.Dom.setStyle(C, "width", C.origwidth + "px");
                            YAHOO.util.Dom.setStyle(C, "height", C.origheight + "px")
                        } else {
                            var A = D.width + G;
                            if (A <= 0) {
                                return
                            }
                            YAHOO.util.Dom.setStyle(C, "width", A + "px");
                            YAHOO.util.Dom.setStyle(C, "height", Math.round(A / C.aspect) + "px")
                        }
                    }
                }
            }
        }
    }
};
vBRestrain.prototype.resizeall = function (B) {
    for (var A in this.containers) {
        this.resize(this.containers[A].object)
    }
};