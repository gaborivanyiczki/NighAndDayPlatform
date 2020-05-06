(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://nighandday.test',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":"password.update","action":"App\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/confirm","name":"password.confirm","action":"App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm"},{"host":null,"methods":["POST"],"uri":"password\/confirm","name":null,"action":"App\Http\Controllers\Auth\ConfirmPasswordController@confirm"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"contact","name":"contact","action":"App\Http\Controllers\HomeController@contact"},{"host":null,"methods":["GET","HEAD"],"uri":"about-us","name":"about","action":"App\Http\Controllers\HomeController@aboutUs"},{"host":null,"methods":["GET","HEAD"],"uri":"news","name":"news","action":"App\Http\Controllers\HomeController@news"},{"host":null,"methods":["GET","HEAD"],"uri":"faq","name":"faq","action":"App\Http\Controllers\HomeController@faq"},{"host":null,"methods":["POST"],"uri":"contact-us","name":"contactus.store","action":"App\Http\Controllers\ContactController@contactPost"},{"host":null,"methods":["GET","HEAD"],"uri":"product\/{slug}","name":"productdetails","action":"App\Http\Controllers\ProductController@details"},{"host":null,"methods":["GET","HEAD"],"uri":"category\/{slug}","name":"categoryproducts","action":"App\Http\Controllers\CategoryController@products"},{"host":null,"methods":["GET","HEAD"],"uri":"fetch-products","name":"fetchproducts","action":"App\Http\Controllers\CategoryController@fetchProducts"},{"host":null,"methods":["GET","HEAD"],"uri":"brand\/{slug}","name":"brand.details","action":"App\Http\Controllers\BrandController@brandDetails"},{"host":null,"methods":["GET","HEAD"],"uri":"fetch-products-brand","name":"brand.fetchbrandproducts","action":"App\Http\Controllers\BrandController@fetchBrandProducts"},{"host":null,"methods":["GET","HEAD"],"uri":"add-to-cart","name":"addtocart","action":"App\Http\Controllers\CartController@addToCart"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/get","name":"getcart","action":"App\Http\Controllers\CartController@getCartContent"},{"host":null,"methods":["GET","HEAD"],"uri":"cart","name":"cart","action":"App\Http\Controllers\CartController@cart"},{"host":null,"methods":["GET","HEAD"],"uri":"remove-from-cart","name":"removefromcart","action":"App\Http\Controllers\CartController@removeItemFromCart"},{"host":null,"methods":["GET","HEAD"],"uri":"update-cart-qty","name":"updatecartquantity","action":"App\Http\Controllers\CartController@updateCartItemQuantity"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/account","name":"myaccount","action":"App\Http\Controllers\UserController@myaccount"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/addresses","name":"myaddresses","action":"App\Http\Controllers\UserController@myaddresses"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/orders","name":"myorders","action":"App\Http\Controllers\UserController@myorders"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/vouchers","name":"myvouchers","action":"App\Http\Controllers\UserController@myvouchers"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/warranties","name":"mywarranties","action":"App\Http\Controllers\UserController@mywarranties"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/reviews","name":"myreviews","action":"App\Http\Controllers\UserController@myreviews"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/settings","name":"user.settings","action":"App\Http\Controllers\UserController@settings"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/subscriptions","name":"mysubscriptions","action":"App\Http\Controllers\UserController@mysubscriptions"},{"host":null,"methods":["POST"],"uri":"user\/postUserAddress","name":"user.add.adress","action":"App\Http\Controllers\UserController@postUserAddress"},{"host":null,"methods":["POST"],"uri":"user\/updateUserAddress","name":"user.edit.adress","action":"App\Http\Controllers\UserController@updateUserAddress"},{"host":null,"methods":["POST"],"uri":"user\/removeUserAddress","name":"removeUserAddress","action":"App\Http\Controllers\UserController@removeUserAddress"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/getUserAddress","name":"getUserAddress","action":"App\Http\Controllers\UserController@getUserAddress"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/getUserDetails","name":"getUserDetails","action":"App\Http\Controllers\UserController@getUserDetails"},{"host":null,"methods":["POST"],"uri":"user\/updateUserDetails","name":"user.edit.details","action":"App\Http\Controllers\UserController@updateUserDetails"},{"host":null,"methods":["POST"],"uri":"user\/resetPassword","name":"user.reset.password","action":"App\Http\Controllers\UserController@resetPassword"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard","name":"dashboard.home","action":"App\Http\Controllers\DashboardController@home"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/settings","name":"dashboard.settings","action":"App\Http\Controllers\DashboardController@settings"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/settings\/edit\/{id}","name":"dashboard.settings.edit","action":"App\Http\Controllers\DashboardController@editSettings"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/settings\/update","name":"dashboard.settings.update","action":"App\Http\Controllers\DashboardController@updateSettings"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/products","name":"dashboard.products","action":"App\Http\Controllers\Dashboard\ProductController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/products\/show","name":"dashboard.product.show","action":"App\Http\Controllers\Dashboard\ProductController@show"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/products\/store","name":"dashboard.product.store","action":"App\Http\Controllers\Dashboard\ProductController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/products\/edit\/{id}","name":"dashboard.product.edit","action":"App\Http\Controllers\Dashboard\ProductController@edit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/products\/update","name":"dashboard.product.update","action":"App\Http\Controllers\Dashboard\ProductController@update"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/products\/updateAttributeGroup","name":"dashboard.product.updateAttributeGroup","action":"App\Http\Controllers\Dashboard\ProductController@updateAttributeGroup"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/products\/addAttributes","name":"dashboard.product.addAttributes","action":"App\Http\Controllers\Dashboard\ProductController@addAttributes"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/products\/delete","name":"dashboard.product.destroy","action":"App\Http\Controllers\Dashboard\ProductController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/products\/deleteAttribute\/{id}\/{productId}","name":"dashboard.product.deleteAttribute","action":"App\Http\Controllers\Dashboard\ProductController@deleteAttribute"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/products\/updateProductAttribute","name":"dashboard.product.updateProductAttribute","action":"App\Http\Controllers\Dashboard\ProductController@updateProductAttribute"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/products\/addProductImage","name":"dashboard.product.addProductImage","action":"App\Http\Controllers\Dashboard\ProductController@addProductImage"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/products\/deleteImage\/{filename}","name":"dashboard.product.deleteImage","action":"App\Http\Controllers\Dashboard\ProductController@deleteImage"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/products\/create\/done","name":"wizard.product.done","action":"App\Http\Controllers\ProductWizardController@done"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/products\/create\/{step?}","name":"wizard.product","action":"App\Http\Controllers\ProductWizardController@create"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/products\/create\/{step}","name":"wizard.product.store","action":"App\Http\Controllers\ProductWizardController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/get","name":"dashboard.attributes.get","action":"App\Http\Controllers\Dashboard\AttributeController@getAttributes"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/getValues","name":"dashboard.attributes.getValues","action":"App\Http\Controllers\Dashboard\AttributeController@getAttributeValues"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes","name":"dashboard.attributes","action":"App\Http\Controllers\Dashboard\AttributeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/values","name":"dashboard.attributes.values","action":"App\Http\Controllers\Dashboard\AttributeController@attributeValues"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/groups","name":"dashboard.attributes.groups","action":"App\Http\Controllers\Dashboard\AttributeController@attributeGroups"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/create","name":"dashboard.attributes.create","action":"App\Http\Controllers\Dashboard\AttributeController@create"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/attributes\/store","name":"dashboard.attributes.store","action":"App\Http\Controllers\Dashboard\AttributeController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/edit\/{id}","name":"dashboard.attributes.edit","action":"App\Http\Controllers\Dashboard\AttributeController@edit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/attributes\/update","name":"dashboard.attributes.update","action":"App\Http\Controllers\Dashboard\AttributeController@update"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/attributes\/delete","name":"dashboard.attributes.destroy","action":"App\Http\Controllers\Dashboard\AttributeController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/values\/create","name":"dashboard.attributes.values.create","action":"App\Http\Controllers\Dashboard\AttributeController@attributeValuesCreate"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/attributes\/values\/store","name":"dashboard.attributes.values.store","action":"App\Http\Controllers\Dashboard\AttributeController@attributeValueStore"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/values\/edit\/{id}","name":"dashboard.attributes.values.edit","action":"App\Http\Controllers\Dashboard\AttributeController@attributeValuesEdit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/attributes\/values\/update","name":"dashboard.attributes.values.update","action":"App\Http\Controllers\Dashboard\AttributeController@attributeValuesUpdate"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/attributes\/values\/delete","name":"dashboard.attributes.values.destroy","action":"App\Http\Controllers\Dashboard\AttributeController@attributeValuesDestroy"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/groups\/create","name":"dashboard.attributes.groups.create","action":"App\Http\Controllers\Dashboard\AttributeController@attributeGroupsCreate"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/attributes\/groups\/store","name":"dashboard.attributes.groups.store","action":"App\Http\Controllers\Dashboard\AttributeController@attributeGroupsStore"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/attributes\/groups\/edit\/{id}","name":"dashboard.attributes.groups.edit","action":"App\Http\Controllers\Dashboard\AttributeController@attributeGroupsEdit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/attributes\/groups\/update","name":"dashboard.attributes.groups.update","action":"App\Http\Controllers\Dashboard\AttributeController@attributeGroupsUpdate"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/attributes\/groups\/delete","name":"dashboard.attributes.groups.destroy","action":"App\Http\Controllers\Dashboard\AttributeController@attributeGroupsDestroy"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/categories","name":"dashboard.categories","action":"App\Http\Controllers\Dashboard\CategoryController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/categories\/show","name":"dashboard.categories.show","action":"App\Http\Controllers\Dashboard\CategoryController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/categories\/create","name":"dashboard.categories.create","action":"App\Http\Controllers\Dashboard\CategoryController@create"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/categories\/store","name":"dashboard.categories.store","action":"App\Http\Controllers\Dashboard\CategoryController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/categories\/edit\/{id}","name":"dashboard.categories.edit","action":"App\Http\Controllers\Dashboard\CategoryController@edit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/categories\/update","name":"dashboard.categories.update","action":"App\Http\Controllers\Dashboard\CategoryController@update"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/categories\/delete","name":"dashboard.categories.delete","action":"App\Http\Controllers\Dashboard\CategoryController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/brands","name":"dashboard.brands","action":"App\Http\Controllers\Dashboard\BrandsController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/brands\/show","name":"dashboard.brands.show","action":"App\Http\Controllers\Dashboard\BrandsController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/brands\/create","name":"dashboard.brands.create","action":"App\Http\Controllers\Dashboard\BrandsController@create"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/brands\/store","name":"dashboard.brands.store","action":"App\Http\Controllers\Dashboard\BrandsController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/brands\/edit\/{id}","name":"dashboard.brands.edit","action":"App\Http\Controllers\Dashboard\BrandsController@edit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/brands\/update","name":"dashboard.brands.update","action":"App\Http\Controllers\Dashboard\BrandsController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/brands\/delete\/{id}","name":"dashboard.brands.delete","action":"App\Http\Controllers\Dashboard\BrandsController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders\/getProducts","name":"dashboard.orders.getProducts","action":"App\Http\Controllers\Dashboard\OrderController@getProducts"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders\/getProductPrice","name":"dashboard.orders.getProductPrice","action":"App\Http\Controllers\Dashboard\OrderController@getProductPrice"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders","name":"dashboard.orders","action":"App\Http\Controllers\Dashboard\OrderController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders\/invoices","name":"dashboard.orders.invoices","action":"App\Http\Controllers\Dashboard\OrderController@invoices"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders\/archived","name":"dashboard.orders.archived","action":"App\Http\Controllers\Dashboard\OrderController@archived"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders\/create","name":"dashboard.orders.create","action":"App\Http\Controllers\Dashboard\OrderController@create"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/orders\/store","name":"dashboard.orders.store","action":"App\Http\Controllers\Dashboard\OrderController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders\/edit\/{id}","name":"dashboard.orders.edit","action":"App\Http\Controllers\Dashboard\OrderController@edit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/orders\/update","name":"dashboard.orders.update","action":"App\Http\Controllers\Dashboard\OrderController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders\/show\/{id}","name":"dashboard.orders.show","action":"App\Http\Controllers\Dashboard\OrderController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders\/archive\/{id}","name":"dashboard.orders.archive","action":"App\Http\Controllers\Dashboard\OrderController@archive"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/orders\/generateInvoice\/{id}","name":"dashboard.orders.generateInvoice","action":"App\Http\Controllers\Dashboard\OrderController@generateInvoice"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/vouchers","name":"dashboard.vouchers","action":"App\Http\Controllers\Dashboard\VouchersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/vouchers\/create","name":"dashboard.vouchers.create","action":"App\Http\Controllers\Dashboard\VouchersController@create"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/vouchers\/store","name":"dashboard.vouchers.store","action":"App\Http\Controllers\Dashboard\VouchersController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/vouchers\/edit\/{id}","name":"dashboard.vouchers.edit","action":"App\Http\Controllers\Dashboard\VouchersController@edit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/vouchers\/update","name":"dashboard.vouchers.update","action":"App\Http\Controllers\Dashboard\VouchersController@update"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/vouchers\/delete\/{id}","name":"dashboard.vouchers.destroy","action":"App\Http\Controllers\Dashboard\VouchersController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/user\/profile","name":"dashboard.user.profile","action":"App\Http\Controllers\Dashboard\UsersController@profile"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/user\/resetPassword","name":"dashboard.user.reset.password","action":"App\Http\Controllers\Dashboard\UsersController@resetPassword"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/user\/updateProfile","name":"dashboard.user.update.profile","action":"App\Http\Controllers\Dashboard\UsersController@updateProfile"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/users","name":"dashboard.users","action":"App\Http\Controllers\Dashboard\UsersController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/users\/edit\/{id}","name":"dashboard.users.edit","action":"App\Http\Controllers\Dashboard\UsersController@edit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/users\/update","name":"dashboard.users.update","action":"App\Http\Controllers\Dashboard\UsersController@update"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/users\/delete","name":"dashboard.users.destroy","action":"App\Http\Controllers\Dashboard\UsersController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/users\/getUserAddress","name":"dashboard.users.getUserAddress","action":"App\Http\Controllers\Dashboard\UsersController@getUserAddress"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/faq","name":"dashboard.faq","action":"App\Http\Controllers\Dashboard\FaqController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/faq\/create","name":"dashboard.faq.create","action":"App\Http\Controllers\Dashboard\FaqController@create"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/faq\/store","name":"dashboard.faq.store","action":"App\Http\Controllers\Dashboard\FaqController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"system\/dashboard\/faq\/edit\/{id}","name":"dashboard.faq.edit","action":"App\Http\Controllers\Dashboard\FaqController@edit"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/faq\/update","name":"dashboard.faq.update","action":"App\Http\Controllers\Dashboard\FaqController@update"},{"host":null,"methods":["POST"],"uri":"system\/dashboard\/faq\/delete","name":"dashboard.faq.destroy","action":"App\Http\Controllers\Dashboard\FaqController@destroy"}],
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

