<?php

/* bt_laparis/template/common/search.twig */
class __TwigTemplate_19d5bba0b5541b452530ab9effd29a7ef6aedc9b9719a800a1e5fb3d9395d31a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"search\" class=\"dropdown\">
  <a class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"lnr lnr-magnifier\"></i></a>
  <div class=\"dropdown-menu\">
    <button type=\"button\" class=\"btn btn-default hidden\"><i class=\"lnr lnr-magnifier\"></i></button>
    <input type=\"text\" name=\"search\" value=\"\" placeholder=\"";
        // line 5
        echo (isset($context["text_search"]) ? $context["text_search"] : null);
        echo "\" class=\"form-control input-lg\" />
  </div>
  <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
        // line 7
        echo (isset($context["text_search"]) ? $context["text_search"] : null);
        echo "</a>
</div>";
    }

    public function getTemplateName()
    {
        return "bt_laparis/template/common/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 7,  25 => 5,  19 => 1,);
    }
}
/* <div id="search" class="dropdown">*/
/*   <a class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-magnifier"></i></a>*/
/*   <div class="dropdown-menu">*/
/*     <button type="button" class="btn btn-default hidden"><i class="lnr lnr-magnifier"></i></button>*/
/*     <input type="text" name="search" value="" placeholder="{{ text_search }}" class="form-control input-lg" />*/
/*   </div>*/
/*   <a class="dropdown-toggle" data-toggle="dropdown">{{ text_search }}</a>*/
/* </div>*/
