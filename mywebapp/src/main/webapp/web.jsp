<web-app xmlns="http://xmlns.jcp.org/xml/ns/javaee" 
          xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
          xsi:schemaLocation="http://xmlns.jcp.org/xml/ns/javaee 
          http://xmlns.jcp.org/xml/ns/javaee/web-app_3_1.xsd"
          version="3.1">

    <servlet>
        <servlet-name>userservlet</servlet-name>
        <servlet-class>com.userverlet</servlet-class>
    </servlet>

    <servlet-mapping>
        <servlet-name>userservlet</servlet-name>
        <url-pattern>storeuser</url-pattern>
    </servlet-mapping>
</web-app>