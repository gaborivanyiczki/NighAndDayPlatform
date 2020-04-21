(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost/NighAndDay',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":"password.update","action":"App\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/confirm","name":"password.confirm","action":"App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm"},{"host":null,"methods":["POST"],"uri":"password\/confirm","name":null,"action":"App\Http\Controllers\Auth\ConfirmPasswordController@confirm"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"contact","name":"contact","action":"App\Http\Controllers\HomeController@contact"},{"host":null,"methods":["GET","HEAD"],"uri":"about-us","name":"about","action":"App\Http\Controllers\HomeController@aboutUs"},{"host":null,"methods":["GET","HEAD"],"uri":"news","name":"news","action":"App\Http\Controllers\HomeController@news"},{"host":null,"methods":["GET","HEAD"],"uri":"faq","name":"faq","action":"App\Http\Controllers\HomeController@faq"},{"host":null,"methods":["POST"],"uri":"contact-us","name":"contactus.store","action":"App\Http\Controllers\ContactController@contactPost"},{"host":null,"methods":["GET","HEAD"],"uri":"product\/{slug}","name":"productdetails","action":"App\Http\Controllers\ProductController@details"},{"host":null,"methods":["GET","HEAD"],"uri":"category\/{slug}","name":"categoryproducts","action":"App\Http\Controllers\CategoryController@products"},{"host":null,"methods":["GET","HEAD"],"uri":"fetch-products","name":"fetchproducts","action":"App\Http\Controllers\CategoryController@fetchProducts"},{"host":null,"methods":["GET","HEAD"],"uri":"brand\/{slug}","name":"brand.details","action":"App\Http\Controllers\BrandController@brandDetails"},{"host":null,"methods":["GET","HEAD"],"uri":"add-to-cart","name":"addtocart","action":"App\Http\Controllers\CartController@addToCart"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/get","name":"getcart","action":"App\Http\Controllers\CartController@getCartContent"},{"host":null,"methods":["GET","HEAD"],"uri":"cart","name":"cart","action":"App\Http\Controllers\CartController@cart"},{"host":null,"methods":["GET","HEAD"],"uri":"remove-from-cart","name":"removefromcart","action":"App\Http\Controllers\CartController@removeItemFromCart"},{"host":null,"methods":["GET","HEAD"],"uri":"update-cart-qty","name":"updatecartquantity","action":"App\Http\Controllers\CartController@updateCartItemQuantity"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/account","name":"myaccount","action":"App\Http\Controllers\UserController@myaccount"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/addresses","name":"myaddresses","action":"App\Http\Controllers\UserController@myaddresses"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/orders","name":"myorders","action":"App\Http\Controllers\UserController@myorders"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/vouchers","name":"myvouchers","action":"App\Http\Controllers\UserController@myvouchers"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/warranties","name":"mywarranties","action":"App\Http\Controllers\UserController@mywarranties"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/reviews","name":"myreviews","action":"App\Http\Controllers\UserController@myreviews"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/settings","name":"user.settings","action":"App\Http\Controllers\UserController@settings"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/subscriptions","name":"mysubscriptions","action":"App\Http\Controllers\UserController@mysubscriptions"},{"host":null,"methods":["POST"],"uri":"user\/postUserAddress","name":"user.add.adress","action":"App\Http\Controllers\UserController@postUserAddress"},{"host":null,"methods":["POST"],"uri":"user\/updateUserAddress","name":"user.edit.adress","action":"App\Http\Controllers\UserController@updateUserAddress"},{"host":null,"methods":["POST"],"uri":"user\/removeUserAddress","name":"removeUserAddress","action":"App\Http\Controllers\UserController@removeUserAddress"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/getUserAddress","name":"getUserAddress","action":"App\Http\Controllers\UserController@getUserAddress"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/getUserDetails","name":"getUserDetails","action":"App\Http\Controllers\UserController@getUserDetails"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

